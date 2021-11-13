<?php


namespace App\Models;


use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable;

use Laravel\Cashier\Billable; // Billable, cashier

use App\Notifications\ResetPassword;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;


// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements JWTSubject
// AuthenticatableContract, 
// AuthorizableContract, 
// CanResetPasswordContract
{
    // HasApiTokens
    use HasFactory, Notifiable, Billable
    // Authenticatable, No es un trait, es una clase abstracta, solo puede con extends
    // Authorizable, No es un trait
    // CanResetPassword
    // MustVerifyEmail
    ;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'name',
        'email',
        'password',
        'provider_id',
        'provider_email',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //JWT

    public function getJWTIdentifier()
{
	return $this->getKey();
}

public function getJWTCustomClaims()
{
	return [];
}

//Relación uno a muchos
public function productos(){ // El usuario podrá tener varios productos

    return $this->hasMany('app\Models\product');
}

public function sendPasswordResetNotification($token)
{
    // $url = 'https://example.com/reset-password?token='.$token;

    $this->notify(new ResetPassword($token));
}

// public function Role(){
//     return $this->belongsTo('app\Models\Role');
// }

// public function esAdmin(){
//     if($this->role->nombre_rol=='admin'){
//         return true;
//     }
//     return false;
// }

}
