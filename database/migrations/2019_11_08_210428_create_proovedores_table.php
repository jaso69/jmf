<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProovedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proovedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profesion')->nullable();
            $table->string('nombre')->nullable();
            $table->string('cif')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('p_contacto')->nullable();
            $table->string('t_contacto')->nullable();
            $table->string('e_contacto')->nullable();
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
        Schema::dropIfExists('proovedores');
    }
}
