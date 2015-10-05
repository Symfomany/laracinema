<?php


namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Model\Actors;
use App\Model\Categories;
use App\Model\Comments;
use App\Model\Movies;
use App\Model\Sessions;
use Carbon\Carbon;

class DashBoardController extends Controller{



    public function dashboard(){

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
            'dob' => $actor->actorsAge(),
            'city' => $actor->actorsorigin(),
            'nbComments' => $nbComments,
            'nbCommentsActifs' => $nbCommentsActifs,
            'nbCommentsValidation' => Comments::statutComments(1)->count(),
            'nbCommentsInactifs' => Comments::statutComments(0)->count(),
            'tauxCommentsActifs' => round($nbCommentsActifs / $nbComments * 100),
            'tauxFilmsFavoris' => round($nbFavMovies / $nbMovies * 100),
            'tauxFilmsVisible' => round($nbVisibleMovies / $nbMovies * 100),
            'categories' => $categorie->categories(),
            'nbSessions' => $session->nextSessions()->count(),
            'nextSessions' => $nextSessions,
            'delaiNextSessions' => $delaiNextSessions,

        ];

        return view('Admin/Pages/dashboard', $datas);
    }



}


















