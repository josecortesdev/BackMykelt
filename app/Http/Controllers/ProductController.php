<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //Obtener todos los productos

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
          );
          $productos = $stripe->products->all(['limit' => 50]);


        $data = $productos->data;

        return $data;


    }

    public function price($productoId){

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
          );

         $priceId = $stripe->prices->all(['product' => $productoId]);

          return $priceId;
    }


    public function card(){

        $user = User::find(auth()->user()->id);

        $intent = $user->createSetupIntent(); // token que genera laravel para crear una tarjeta con stripe

        return product::all();

    }
    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new product;

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->userid = auth()->user()->id;
        $product->save();

        Cache::flush(); // Eliminar los datos de la caché
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){


        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
          );
         $details = $stripe->products->retrieve(
            $id,
            []
          );

          return $details;


        // return product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //VALIDACIÓN
        $request->validate(    // decimos que estos campos son requeridos
            [
                'name' => 'required',
                'price' => 'required'
            ]
        );

        $UpdateProduct = product::findOrFail($id);
        $UpdateProduct->name = $request->name;
        $UpdateProduct->price = $request->price;
        

        $UpdateProduct->save();

        Cache::flush(); // Eliminar los datos de la caché
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        Cache::flush(); // Eliminar los datos de la caché
    }
}
