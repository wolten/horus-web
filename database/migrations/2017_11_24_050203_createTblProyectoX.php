<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProyectoX extends Migration
{

    public function up()
    {
      Schema::enableForeignKeyConstraints();
      Schema::create('tbl_proyectox', function (Blueprint $table)
      {
          $table->increments('id');
          $table->string('nombre');
          $table->string('descripcion');

          $table->integer('cliente_id')->unsigned();
          $table->foreign('cliente_id')->references('id')->on('tbl_clientes');

          $table->timestamps();
          $table->softDeletes();
      });
    }


    public function down()
    {
      Schema::dropIfExists('tbl_proyectox');
    }
}
