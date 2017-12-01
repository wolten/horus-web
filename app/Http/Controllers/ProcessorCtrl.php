<?php

namespace App\Http\Controllers;

use App\Processor;
use App\Nugget;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;


class ProcessorCtrl extends Controller
{

    public function __construct(){         $this->middleware('auth');     }


    public function store($modulo, $lectura1, $lectura2, $lectura3, $lectura4)
    {
        try
        {
          $modulo = Nugget::where('numeroSerie', $modulo)->first();

          //Validando
          if(!$modulo)
          {
            $response["status"] = 0;
            return response()->json($response, 200);
          }


          #LECTURA 1
          $input["nugget_id"]     = $modulo->id;
          $input['type_id']       = 1;
          $input['valor']         = $lectura1;

          $obj = Processor::create($input);


          #LECTURA 2
          $input2["nugget_id"]     = $modulo->id;
          $input2['type_id']       = 2;
          $input2['valor']         = $lectura2;

          $obj = Processor::create($input2);


          #LECTURA 3
          $input3["nugget_id"]     = $modulo->id;
          $input3['type_id']       = 3;
          $input3['valor']         = $lectura3;

          $obj = Processor::create($input3);


          #LECTURA 4
          $input4["nugget_id"]     = $modulo->id;
          $input4['type_id']       = 4;
          $input4['valor']         = $lectura4;

          $obj = Processor::create($input4);


          return response()->json(['status'=>'1'], 200);
          #return view('eventos.index',compact('tema','crews','tareas','padre','eventos'));

        }catch (QueryException $e)
        {
              $response["error"] = $e;
              $response["status"] = 0;
              return response()->json($response, 200);
        }
    }

}
