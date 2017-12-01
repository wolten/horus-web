<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFieldsProyectos extends Migration
{

    public function up()
    {


        Schema::table('tbl_proyectox', function (Blueprint $table)
        {
          $table->dropForeign('tbl_proyectox_cliente_id_foreign');
          $table->dropColumn('cliente_id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
        });
    }


    public function down()
    {
        //
    }
}
