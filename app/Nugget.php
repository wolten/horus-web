<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nugget extends Model
{
  Protected $table="tbl_nuggets";
  protected $fillable = ['nombre','numeroSerie','proyecto_id'];
}
