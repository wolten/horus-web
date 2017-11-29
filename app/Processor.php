<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
  Protected $table="tbl_nuggets_log";
  protected $fillable = ['nugget_id','type_id','valor'];
}
