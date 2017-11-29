<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRoles extends Migration
{

    public function up()
    {
      Schema::enableForeignKeyConstraints();
      Schema::create('tbl_roles', function (Blueprint $table)
      {
          $table->increments('id');
          $table->string('nombre');
          $table->string('descripcion')->nullable();

          $table->timestamps();
          $table->softDeletes();
      });
    }


    public function down()
    {
        Schema::dropIfExists('tbl_roles');
    }
}
