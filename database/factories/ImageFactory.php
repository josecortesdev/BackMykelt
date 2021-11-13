<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{

    protected $model = Image::class;

    public function definition()
    {
        return [
            // public/storage/posts
            'url' => 'posts/' . $this->faker->image('storage/app/public', 640, 480, null, false)
            //ancho, alto. Si fuese true, nos la almacena en public/storage/posts/imagen.jpg
            //le ponemos false para que no lo almacene de esa manera,
            //añadimos el 'posts/' . concatenando para que lo almacene así
        ];
    }
}
