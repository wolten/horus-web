<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
  Protected $table="tbl_proyectox";
  protected $fillable = ['nombre','descripcion','cliente_id'];
}
