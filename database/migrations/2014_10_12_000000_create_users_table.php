<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();//modificado socialite
            $table->string('email')->unique()->nullable(); //modificado socialite
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); //modificado socialite

            $table->string('provider_id')->nullable();
            $table->string('provider_email')->nullable();

            $table->boolean('is_admin')->default(false)->nullable();  // Ponemos que pueda ser nulo para que no de error si este campo no está contemplado en el formulario

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
