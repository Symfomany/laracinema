<?php


namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Formatter
 * Format datas
 * @package App\Api
 */
class Formatter extends Facade{

    protected static function getFacadeAccessor() {
        return 'formatter';
    }



}