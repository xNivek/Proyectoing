<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('rut', 255);
            $table->string('email', 255)->unique();
            $table->enum('rol', ['Administrador', 'Estudiante tesista', 'Profesor guia', 'Secretaria', 'Encargado de titulacion'])->default('Administrador');
            $table->string('password');
            $table->enum('status', ['VISIBLE', 'NO VISIBLE'])->default('VISIBLE');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
