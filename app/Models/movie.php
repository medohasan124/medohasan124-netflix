<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;


    public function genra(){
        return $this->belongsToMany(genra::class,'movies_genras');
    }
}
