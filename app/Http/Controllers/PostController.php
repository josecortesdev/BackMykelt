<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return $posts;
    }

    public function image($id)
    {

        $post = Post::findOrFail($id);
        // return $post;

        $url = public_path() . '/storage/' . $post->image;
        return response()->download($url);

        // return response()->download(public_path((Storage::url($id))), $post->name);
        //response (como respuesta), método download para descargar, la ruta pública
        //Storage, nos devuelve la ruta del storage(dentro de public)
        //Con la url le pasamos la imagen del artículo
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post($request->all());
        // $post->name = $request->input('name');
        // $post->body = $request->input('body');

        // $path = $request->image->store('/posts'); // Guardamos la imagen. El método store la guarda 

        // $post->image = $path; // El campo image, tendrá esta ruta

        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // Esto es el detail
    {

        return Post::findOrFail($id);
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
    public function update(Request $request)
    {


        $id = $request->input('id');
        $post = Post::findOrFail($id);


        // $pathOldImage = $post->image; //obtener la ruta de la imagen 
        //Storage::delete($pathOldImage); //Eliminar la imagen


        // $pathNewImage = $request->image->store('/posts'); // Guardamos la imagen. El método store la guarda 
        // $post->image = $pathNewImage; // El campo image, tendrá esta ruta


        $post->name = $request->input('name');
        $post->header = $request->input('header');
        $post->body = $request->input('body');
        $post->imageURL = $request->input('imageURL');
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $post = Post::findOrFail($id);

        // $path = $post->image; //obtener la ruta de la imagen 

        // Storage::delete($path); //Eliminar la imagen

        $post->delete();
    }
}
