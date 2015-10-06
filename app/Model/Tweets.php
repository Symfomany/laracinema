<?php

namespace App\Model;

use Jenssegers\Mongodb\Model;



class Tweets extends Model
{

    /**
     * @var string
     */
    protected $connection = 'mongodb';


    /**
     * @var string
     */
    protected $collection = 'tweets';

}