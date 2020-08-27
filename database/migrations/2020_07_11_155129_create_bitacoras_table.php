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
            $table->integer('profesor1_id')->unsigned();
            $table->integer('profesor2_id')->unsigned()->nullable();
            $table->integer('tesista1_id')->unsigned();
            $table->integer('tesista2_id')->unsigned()->nullable();
            $table->integer('tesista3_id')->unsigned()->nullable();
            $table->integer('tesista4_id')->unsigned()->nullable();

            $table->integer('user_id')->unsigned();
            $table->enum('status', ['En Desarollo', 'No continuidad', 'Aprobacion'])->default('En Desarollo');

            $table->foreign('profesor1_id')->references('id')->on('users');
            $table->foreign('profesor2_id')->references('id')->on('users');    
            $table->foreign('tesista1_id')->references('id')->on('users');    
            $table->foreign('tesista2_id')->references('id')->on('users');    
            $table->foreign('tesista3_id')->references('id')->on('users');    
            $table->foreign('tesista4_id')->references('id')->on('users');     

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
