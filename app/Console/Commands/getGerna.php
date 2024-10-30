<?php

namespace App\Console\Commands;

use App\Models\genra;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getGerna extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:genra';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get data from TMBD';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $url = env('TMDBURL') ;
        $type = '/3/genre/movie/list' ;
        $api_key = env('TMDB_API_KEY') ;
        $response = Http::get($url.$type.$api_key);

        foreach($response->json()['genres'] as $genra){

            genra::create([
                'name' =>  $genra['name'],
                'eid' =>  $genra['id'],
            ]);
        }


    }
}
