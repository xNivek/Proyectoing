<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string ('nombre',255);
            $table->string('texto',255);
            $table->integer('avance_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('avance_id')->references('id')->on('avances');
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
        Schema::dropIfExists('comentarios');
    }
}
