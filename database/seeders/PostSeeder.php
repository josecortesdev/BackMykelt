<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;

use Illuminate\Database\Seeder;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $posts = Post::factory(20)->create(); // crea los 20 registros de posts y almacénalo en una variable

       foreach($posts as $post){ // Por cada post que se genere una imagen y la info de esta, que se almacene en la tabla image

        Image::factory(1)->create([  
            'imageable_id' => $post->id,
            'imageable_type' => Post::class
        ]);
       }
    }
}
