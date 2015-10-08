<?php

namespace App\Model;

use Jenssegers\Mongodb\Model;


/**
 * Class Tasks représentant la table tasks
 * @package app\Model
 */
class Tasks extends Model
{

    /**
     * @var string
     */
    protected $connection = 'mongodb';


    /**
     * @var string
     */
    protected $collection = 'tasks';



}