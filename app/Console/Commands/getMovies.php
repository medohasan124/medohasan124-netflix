<?php

namespace App\Console\Commands;

use App\Models\genra;
use App\Models\movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Movies Successfully';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $url = env('TMDBURL') ;
        $type = '/3/discover/movie' ;
        $api_key = env('TMDB_API_KEY') ;
        $response = Http::get($url.$type.$api_key);

        foreach($response->json()['results'] as $movie){
            $movies =   movie::create([
                'eid' =>           $movie['id'],
                'adult' =>         $movie['adult'],
                'backdrop_path' =>      $movie['backdrop_path'],
                'language' =>      $movie['original_language'],
                'title' =>         $movie['title'],
                'description' =>   $movie['overview'],
                'poster' =>        $movie['poster_path'],
                'release_date' =>  $movie['release_date'],
                'vote' =>          $movie['vote_average'],
                'vote_count' =>    $movie['vote_count'],

            ]);

            foreach($movie['genre_ids'] as $genras){

                $genraId = genra::where('eid', $genras)->first() ;
               $movies->genra()->attach($genraId);
             }
    }
}
}
