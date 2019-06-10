<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicoTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academico_trabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_trabajo')->unsigned();
            $table->integer('id_academico')->unsigned();
            $table->enum('tipo',['GUIA','CORRECTOR']);
            $table->timestamps();

            $table->foreign('id_trabajo')->references('id')->on('trabajos');
            $table->foreign('id_academico')->references('id')->on('academicos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academico_trabajo');
    }
}
