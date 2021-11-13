<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price', 8, 2);
            $table->unsignedBigInteger('userid')->nullable(); 
            // Este hará referencia al id del usuario
            // Especificamos que se pueda poner nulo por si se borra el usuario

            
            // Tengo que poner una restricción de llave foránea para que no haya un número que no pertenezca a un id existente


            $table->foreign('userid')
            ->references('id')
            ->on('users')
            ->onDelete('set null');

            //references: a qué campo hace referencia | on: en qué tabla | 
            //on delete - set null - Si se elimina un usuario, no quiero que se elimine sus productos
            // si esta campo va a quedar null, tenemos que especificar arriba que pueda aceptar valores nulos

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
        Schema::dropIfExists('products');
    }
}
