<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_actividad')->unsigned();
            $table->string('nombre_trabajo',64);
            $table->string('org_nombre',64)->nullable();
            $table->string('tutor_nombre',64)->nullable();
            $table->integer('numero_registro')->nullable();
            $table->double('nota')->unsigned()->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_examen')->nullable();
            $table->enum('estado',['INGRESADA','ACEPTADA','FINALIZADA','ANULADA'])->default('INGRESADA');
            
            $table->timestamps();

            $table->foreign('id_actividad')->references('id')->on('actividads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
}
