<?php

namespace App\Console\Commands;

use App\Model\Tweets;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Twitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Youtube import tweets on Mongo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $tweets = \Thujohn\Twitter\Facades\Twitter::getUserTimeline(
            [
                'screen_name' => 'allocine',
                'count' => 15,
                'format' => 'php']);

        if(!empty($tweets)){

            DB::connection('mongodb')->collection('tweets')->delete();
            foreach($tweets as $tweet){
                $vi = new Tweets();
                $vi->data = $tweet;
                $vi->save();
            }
        }
    }
}
