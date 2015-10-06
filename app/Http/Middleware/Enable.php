<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Enable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        $now = new \DateTime('now');

        if($user->active == 0 || $user->expiration_date < $now->format('Y-m-d H:i:s')){
            Auth::logout();
            Session::flash('danger', "Vous devez confirmer votre compte ou votre période d'essaie est terminée");
            return redirect('auth/login');
        }
        return $next($request);
    }
}
