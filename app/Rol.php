<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  Protected $table="tbl_roles";
  protected $fillable = ['nombre','descripcion'];
}
