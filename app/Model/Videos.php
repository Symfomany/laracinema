<?php

namespace App\Model;

use Jenssegers\Mongodb\Model;



class Videos extends Model
{

    /**
     * @var string
     */
    protected $connection = 'mongodb';


    /**
     * @var string
     */
    protected $collection = 'videos';

}