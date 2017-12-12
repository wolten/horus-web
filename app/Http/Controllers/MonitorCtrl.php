<?php

namespace App\Http\Controllers;

use App\Monitor;
use App\Proyecto;
use App\Nugget;
use App\Processor;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class MonitorCtrl extends Controller
{

    public function show($id)
    {
        $proyecto = Proyecto::where('id', $id)->first();
        $modulos  = Nugget::where('proyecto_id', $id)->get();

        return view("monitor.show",compact('modulos','proyecto'));
    }

    public function getUltimoEvento($modulo_id, $cuantos=10)
    {
        $eventos = Processor::where('nugget_id', $modulo_id)
                  ->orderBy('created_at','DESC')
                  ->take($cuantos)
                  ->get();
        return $eventos;

    }


}
