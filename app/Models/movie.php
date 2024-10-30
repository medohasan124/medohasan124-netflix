<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'adult',
        'backdrop',
        'eid',
        'language',
        'title',
        'description',
        'poster',
        'release_date',
        'vote',
        'vote_count',

    ];

     protected $appends = ['poster_path','banner_path'];

 



    public function getPosterPathAttribute(){

        return 'https://image.tmdb.org/t/p/w500' . $this->poster ;
    }
     public function getBannerPathAttribute(){

         return 'https://image.tmdb.org/t/p/w500' . $this->backdrop ;
     }


    public function genra(){
        return $this->belongsToMany(genra::class,'movies_genras');
    }
}
