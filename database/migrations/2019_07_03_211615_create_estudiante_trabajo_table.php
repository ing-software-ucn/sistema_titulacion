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

            $table->integer('id_trabajo')->unsigned();
            $table->integer('id_estudiante')->unsigned();
            $table->timestamps();

            $table->foreign('id_trabajo')->references('id')->on('trabajos');
            $table->foreign('id_estudiante')->references('id')->on('estudiantes');
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
