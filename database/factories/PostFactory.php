<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->unique()->sentence();
        //llamamos a faker para que se llene con un nombre falso
        //unique para que el nombre generado sea único
        //sentence para que genere una sentencia, 



        return [
            'name' => $name,
            'body' => $this->faker->text(2000) 
            // usamos una faker para decirle que se rellene con un texto de 2000 caracteres

        ];
    }
}
