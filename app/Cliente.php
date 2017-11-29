<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  Protected $table="tbl_clientes";
  protected $fillable = ['email','nombre','direccion','celular','celular','telefono'];
}
