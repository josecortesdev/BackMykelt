<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $iduser = auth()->user()->id;
        $cart = DB::table('carts')->where('idUser', $iduser)->get();

        return $cart;
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

        //Si ya está en el carrito, no crees uno nuevo, solo modifica el existente

        $idproduct = $request->input('idProduct');

        if (Cart::where('idProduct', $idproduct)->where('idUser', auth()->user()->id)->first()) {

            $ProductChangeValues = Cart::where('idProduct', $idproduct)->first();

            $ProductChangeValues->quantity = $request->input('quantity');

            $ProductChangeValues->save();
            return response()->json(['message' => 'Producto modificado']);
        } else { // Si no existe, crea uno nuevo

            $cart = new Cart;

            $cart->idUser = auth()->user()->id;
            $cart->idProduct = $request->input('idProduct');
            $cart->idPrice = $request->input('idPrice');
            $cart->quantity = $request->input('quantity');

            $cart->save();

            return response()->json(['message' => 'Producto incluido en el carrito']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartProduct = Cart::findOrFail($id);

        $cartProduct->delete();
    }
}
