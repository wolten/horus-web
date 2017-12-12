<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
  Protected $table="tbl_monitor";
  protected $fillable = ['nugget_id','type_id','valor'];
}
