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
            $table->integer('trabajo_id')->unsigned();
            $table->integer('academico_id')->unsigned();
            $table->enum('tipo',['GUIA','CORRECTOR'])->default('CORRECTOR');
            $table->timestamps();

            $table->foreign('trabajo_id')->references('id')->on('trabajos');
            $table->foreign('academico_id')->references('id')->on('academicos');


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
