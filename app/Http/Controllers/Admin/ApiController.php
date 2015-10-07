<?php


namespace App\Http\Controllers\Admin;


use App\Api\Facades\Formatter;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Sessions;
use Illuminate\Support\Facades\App;


class ApiController extends Controller{


    /**
     * Get Nb Categories by movies
     * @return array
     */
    public function getCategories(){

        $categories = Categories::bestCategories(15)->get()->toArray();

//        exit(dump(App::make('formatter'), App::make('formatter'))); create same instance by DIC
        $datas = Formatter::getPieChartsFormat($categories); //access to facade Design Pattern

        return response()->json($datas);
    }

    /**
     * Get Nb Categories by movies
     * @return array
     */
    public function getSessions(){

        $sessions = Sessions::sessionsByMonths()->get()->toArray();

        $datas = Formatter::getColumnsThreeDimensions($sessions); //access to facade Design Pattern

        return response()->json($datas);
    }



}


















