<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('idUser')->nullable(); 
            // Este hará referencia al id del usuario
            // Especificamos que se pueda poner nulo por si se borra el usuario

            $table->string('idProduct');
            $table->string('idPrice');
            $table->integer('quantity');
            
            // Tengo que poner una restricción de llave foránea para que no haya un número que no pertenezca a un id existente
            $table->foreign('idUser')
            ->references('id')
            ->on('users')
            ->onDelete('set null');

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
        Schema::dropIfExists('carts');
    }
}
