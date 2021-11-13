<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['name', 'header', 'body', 'imageURL'];

    use HasFactory;

    // Relación uno a uno polimórfica

    // public function image(){
    //     return $this->morphOne(Image::class, 'imageable');  
    //     // parámetros: nombre del modelo y del método para hacer esta relación

    // }



}
