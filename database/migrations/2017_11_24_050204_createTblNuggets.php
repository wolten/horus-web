<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNuggets extends Migration
{

    public function up()
    {
      Schema::enableForeignKeyConstraints();
      Schema::create('tbl_nuggets', function (Blueprint $table)
      {
          $table->increments('id');
          $table->string('nombre');
          $table->string('numeroSerie')->index();

          $table->integer('proyecto_id')->unsigned();
          $table->foreign('proyecto_id')->references('id')->on('tbl_proyectox');

          $table->timestamps();
          $table->softDeletes();
      });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_nuggets');
    }
}
