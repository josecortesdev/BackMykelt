<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillablename = ['name']; 
    protected $fillableprice = ['price']; 
		// Esta propiedad es para que el campo nombre nunca esté vacío


    //Relación uno a muchos (inversa)

    public function user(){ // En singular, ya que solo lo ha publicado un usuario
      
      return $this->belongsTo('app\Models\User');
    }

}
