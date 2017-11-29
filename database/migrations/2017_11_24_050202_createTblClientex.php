<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblClientex extends Migration
{

    public function up()
    {
      Schema::enableForeignKeyConstraints();
      Schema::create('tbl_clientes', function (Blueprint $table)
      {
          $table->increments('id');
          $table->string('email');
          $table->string('nombre');
          $table->string('direccion');
          $table->string('celular')->nullable();
          $table->string('telefono')->nullable();
          $table->integer('rol_id')->unsigned();
          $table->foreign('rol_id')->references('id')->on('tbl_roles');

          $table->timestamps();
          $table->softDeletes();
      });
    }


    public function down()
    {
          Schema::dropIfExists('tbl_clientes');
    }
}
