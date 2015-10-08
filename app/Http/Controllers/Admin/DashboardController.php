<?php


namespace App\Http\Controllers\Admin;



use App\Events\NotificationsEvent;
use App\Events\TasksEvent;
use App\Http\Controllers\Controller;
use App\Model\Actors;
use App\Model\Categories;
use App\Model\Comments;
use App\Model\Messages;
use App\Model\Movies;
use App\Model\Sessions;
use App\Model\Tasks;
use App\Model\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller{


    public function dashboard(){

        $videos =  collect(DB::connection('mongodb')->collection('videos')->get())->shuffle();
        $tweets =  DB::connection('mongodb')->collection('tweets')->take(15)->get();
        $youtubeinfo =  DB::connection('mongodb')->collection('stats')
            ->where(['origin' => 'Youtube', 'type' => 'infos'])
            ->first();

        $tweeterinfo =  DB::connection('mongodb')->collection('stats')
            ->where(['origin' => 'Twitter', 'type' => 'infos'])
            ->first();

        $actor = new Actors();
        $movie = new Movies();
        $categorie = new Categories();
        $session = new Sessions();

        $nbComments = Comments::count();
        $nbCommentsActifs = Comments::statutComments(2)->count();
        $nbMovies = Movies::count();
        $nbFavMovies = $movie->favMovies();
        $nbVisibleMovies = $movie->visible();

        // Récupération des prochaines sessions
        $nextSessions = $session->nextSessions()->get();
        $now = Carbon::now();

        $delaiNextSessions = array();

        // Calcul du délai avant les prochaines séances, et ajout à un tableau
        foreach ($session->nextSessions()->get() as $session) {

            $dateSession = new Carbon($session->date_session);

            $delai = $now->diffInDays($dateSession);

            // Couleur du label associé
            if ($delai < 3) {
                $color = "danger";
            } else if ($delai < 8) {
                $color = "warning";
            } else {
                $color = "success";
            }

            $delaiNextSessions[$session->id] = array('delai' => $delai, 'color' => $color);
        }



        $datas = [
            "tasks" => Tasks::orderBy('created_at','desc')->take(20)->get(),
            "messages" => Messages::orderBy('created_at','desc')->take(10)->get(),
            'youtubeinfo' => $youtubeinfo['data'],
            'youtubeinfodateupdated' => $youtubeinfo['created_at']->sec,
            'tweeterinfo' => $tweeterinfo['data'][0],
            'tweeterinfodateupdated' => $tweeterinfo['created_at']->sec,
            'videos' => $videos,
            'video' => $videos[0],
            'tweets' => $tweets,
            'dob' => $actor->actorsAge(),
            'city' => $actor->actorsorigin(),
            'nbCommentsActifs' => $nbCommentsActifs,
            'nbCommentsValidation' => Comments::statutComments(1)->count(),
            'nbCommentsInactifs' => Comments::statutComments(0)->count(),
            'tauxCommentsActifs' => round($nbCommentsActifs / $nbComments * 100),
            'tauxFilmsFavoris' => round($nbFavMovies / $nbMovies * 100),
            'tauxFilmsVisible' => round($nbVisibleMovies / $nbMovies * 100),
            'categories' => $categorie->categories(),
            'nbSessions' => $session->nextSessions()->count(),
            'nbseances' => Sessions::count(),
            'nbcomments' => $nbComments,
            'nbfilms' => Movies::count(),
            'nbusers' => Users::count(),
            'nextSessions' => $nextSessions,
            'delaiNextSessions' => $delaiNextSessions,

        ];

        return view('Admin/Pages/dashboard', $datas);
    }


    /**
     * Create Task
     * @param Request $request
     * @return array
     */
    public function task(Request $request){

        event(new TasksEvent($request->message, $request->criticity));
        event(new NotificationsEvent("Un administrateur vient de se créer une tâche", $request->criticity));

        return array(true);

    }


}


















