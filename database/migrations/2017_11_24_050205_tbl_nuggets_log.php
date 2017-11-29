<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblNuggetsLog extends Migration
{

    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('tbl_nuggets_log', function (Blueprint $table)
        {
            $table->increments('id');

            $table->integer('nugget_id')->unsigned();
            $table->foreign('nugget_id')->references('id')->on('tbl_nuggets');

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('tbl_types_sensors');

            $table->string('valor');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tbl_nuggets_log');
    }
}
