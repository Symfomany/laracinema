<?php

namespace App\Console\Commands;

use App\Model\Videos;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Alaouy\Youtube\Facades\Youtube as Yt;

class Youtube extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtube:import {keyword}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Youtube import videos on Mongo';

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
        $keyword = $this->argument('keyword');


        $params = array(
            'q'             => $keyword,
            'type'          => 'video',
            'part'          => 'id, snippet',
            'maxResults'    => 20
        );

        $videos = Yt::searchAdvanced($params, true)['results'];

        if(!empty($videos)){

            DB::connection('mongodb')->collection('videos')->delete();
            foreach($videos as $video){
                $vi = new Videos();
                $vi->data = $video;
                $vi->save();
            }
        }

        Log::info("Importd e l'Api video fait ");


    }
}
