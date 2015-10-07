<?php

namespace App\Model;

use Jenssegers\Mongodb\Model;



class Stats extends Model
{

    /**
     * @var string
     */
    protected $connection = 'mongodb';


    /**
     * @var string
     */
    protected $collection = 'stats';

}