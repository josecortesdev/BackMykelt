<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['idProduct', 'idPrice', 'quantity'];

        //Relación uno a muchos (inversa)

        public function user(){ // En singular, ya que solo lo ha publicado un usuario
      
            return $this->belongsTo('app\Models\User');
          }

}
