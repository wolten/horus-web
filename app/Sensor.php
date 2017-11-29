<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  Protected $table="tbl_types_sensors";
  protected $fillable = ['nombre','descripcion'];
}
