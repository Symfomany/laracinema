<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Events\AdministratorsEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /*
    * Redirections (surcharge des valeurs par défaut de Laravel)
    */
    protected $loginPath = '/auth/login';
    protected $redirectPath = '/admin/';
    protected $redirectAfterLogout = '/auth/login/';
    protected $redirectTo = '/admin/login';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'update', 'store']]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());



        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());


        // fire launch on administrateurs....
        Event::fire(new AdministratorsEvent($user));

        Auth::login($user);

        return redirect($this->redirectPath());
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:administrators',
            'password' => 'required|confirmed|min:6',
            'description' => 'min:10|max:160',
            'photo' => array(
                'url',
                'regex:/.jpg$|.gif$|.jpeg$|.png$/')
        ], [
            'email.required' => 'Il faut une adresse email!!',
            'email.email' => 'Mauvaise adresse email ...:(',
            'required' => 'Ce champ doit être renseigné',
            'min' => 'Ce champ doit faire plus de :min caractères',
            'max' => 'Ce champ doit faire moins de :max caractères',
            'confirmed' => 'La confirmation ne correspond pas au mot de passe',
            'unique' => 'Cette adresse email est déjà utilisée',
            'url' => 'Ce champ doit être une URL valide',
            'regex' => 'Ce champ doit être une image valide'

        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'lastname' => $data['lastname'],
            'active' => 1,
            'expiration_date' => new \DateTime('+ 1 year'),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstname' => $data['firstname'],
            'photo' => $data['photo'],
            'description' => $data['description'],
        ]);
    }

    public function getLogin()
    {
        return view('Admin/Auth/login');
    }

    public function getRegister()
    {
        return view('Admin/Auth/register');
    }

    public function update()
    {
        return view('Admin/Auth/update');
    }

    public function store(Request $request)
    {
        $request->user()->update([
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'firstname' => $request['firstname'],
            'photo' => $request['photo'],
            'description' => $request['description'],
        ]);
        Session::flash('success', "Votre profil a bien été modifié");
        return Redirect::route('movies.index');

    }

}