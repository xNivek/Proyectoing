<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('profesor1', 255);
            $table->string('rutprofesor1', 255);
            $table->string('profesor2', 255)->nullable();
            $table->string('rutprofesor2', 255)->nullable();
            $table->string('estudiante1', 255);
            $table->string('rutestudiante1', 255);
            $table->string('carreraestudiante1', 255);
            $table->string('estudiante2', 255)->nullable();
            $table->string('rutestudiante2', 255)->nullable();
            $table->string('carreraestudiante2', 255)->nullable();
            $table->string('estudiante3', 255)->nullable();
            $table->string('rutestudiante3', 255)->nullable();
            $table->string('carreraestudiante3', 255)->nullable();
            $table->string('estudiante4', 255)->nullable();
            $table->string('rutestudiante4', 255)->nullable();
            $table->string('carreraestudiante4', 255)->nullable();
            $table->integer('user_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users');    
            
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
        Schema::dropIfExists('bitacoras');
    }
}
