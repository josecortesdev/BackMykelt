<?php

namespace Database\Seeders;

use JWTAuth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

                // Crear Admin
                $user = User::create([
                    'name' => 'developer',
                    'email' => 'josecortesdev@gmail.com',
                    'password' => Hash::make('DEVELOPER_PASSWORD'),
                    'is_admin' => true

                ]);
                // $user->createAsStripeCustomer(); 

                $user2 = User::create([
                    'name' => 'admincarlos',
                    'email' => 'carlos@mykelt.com',
                    'password' => Hash::make('CARLOS_PASSWORD'),
                    'is_admin' => true

                ]);


                $user3 = User::create([
                    'name' => 'usuario',
                    'email' => 'usuario@gmail.com',
                    'password' => Hash::make('USUARIO_PASSWORD'),
                ]);


    }
}
