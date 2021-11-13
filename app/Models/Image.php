<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //Relación polimórfica

    public function imageable(){ // le ponemos el mismo nombre que el campo que creamos

        //Que nos retorne una relación polimórfica 
      //  return $this->morphTo();

    }
}
