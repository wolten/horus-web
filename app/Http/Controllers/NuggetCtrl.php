<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Nugget;
use App\Proyecto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class NuggetCtrl extends Controller
{
    public function __construct(){      $this->middleware('auth');  }



    public function create($id)
    {
        $proyecto = Proyecto::where('id', $id)->first();
        return view('dispositivo.nuevo', compact('proyecto'));
    }

    public function delete(Request $request)
    {
      $device = Nugget::where('id', $request->input('dispositivo'))->first();
      if($device)
      {
        if($device->delete())
        {
          return response()->json(['status'=>'success'], 200);
        }
      }
        else
        {
          return response()->json(['status'=>'error'], 200);
        }
    }

    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                        'nombre' => 'required|max:255',
                        'numeroSerie' => 'required|min:12',
                        'proyecto_id' => 'required'
                    ]);

            if ($validator->fails())
            {
                return redirect::back()
                            ->withErrors($validator);
            }


            try
            {
              $idProyecto               = $request->input('proyecto_id');
              $input                    = $request->all();
              $input['user_id']         = Auth::id();
              $device                   = Nugget::create($input);

              #return response()->json(['status'=>'success', 'data'=>$device], 200);
              return redirect()->route('proyecto.viewr', [ 'id' => $idProyecto]);


            }catch (QueryException $e)
            {
                  #$response["error"] = $e;
                  return redirect::back();
            }

    }



}
