<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();	
            $table->string('imagen')->nullable();
            $table->decimal('precio', 8, 2)->nullable();
            $table->decimal('descuento', 8, 2)->nullable();
            $table->integer('id_categoria')->unsigned()->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->timestamps();
        });
    }
// Nombre (Requerido), descripción, imagen (Mínimo 300 x 300), precio (Requerido), descuento y una llave foranea con el id de la categoría (Requerida)
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
