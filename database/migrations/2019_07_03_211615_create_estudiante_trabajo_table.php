<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_trabajo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('trabajo_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();

            $table->foreign('trabajo_id')->references('id')->on('trabajos');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante_trabajo');
    }
}
