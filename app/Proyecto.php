<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Proyecto extends Model
{
  use SoftDeletes;

  Protected $table="tbl_proyectox";
  protected $fillable = ['nombre','descripcion','user_id'];
}
