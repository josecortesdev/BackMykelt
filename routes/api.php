<?php


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;

use App\Http\Controllers\PostController;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('password/email', 'ForgotPasswordController@forgot');
Route::post('password/reset', 'ForgotPasswordController@reset');

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::post('logout', 'UserController@logout');


Route::resource('products', '\App\Http\Controllers\ProductController');

Route::get('products/price/{productoId}', 'ProductController@price');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','UserController@getAuthenticatedUser');
    
    Route::get('products/card', 'ProductController@card');

    Route::resource('cart', '\App\Http\Controllers\CartController');

});

// POSTS
Route::get('posts', 'PostController@index');
Route::get('posts/{id}/image', 'PostController@image');
Route::get('posts/{post}', 'PostController@show');


// Para poder acceder a Auth::user() en el middleware del admin -> Primero es necesario que pase el middleware jwt, después el admin
Route::group(['middleware' => 'jwt.verify'], function () { 

        //Añadir, editar y eliminar posts
        Route::group(['middleware' => 'admin'], function () {   

        //store
        Route::post('posts', 'PostController@store');
        //update
        Route::put('posts/{post}', 'PostController@update');
        //destroy
        Route::delete('posts/{post}', 'PostController@destroy');

        });
});




