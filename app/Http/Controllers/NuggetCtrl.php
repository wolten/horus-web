<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Nugget;
use App\Proyecto;



class NuggetCtrl extends Controller
{
    public function __construct(){      $this->middleware('auth');  }



    public function create($id)
    {
        $proyecto = Proyecto::where('id', $id)->first();
        return view('dispositivo.nuevo', compact('proyecto'));
    }

    

    public function store(Request $request)
    {
          if($request->ajax())
          {

            $validator = $this->validate($request,
                          [
                               'nombre' => 'required|max:255',
                               'numeroSerie' => 'required',
                          ]);
            try
            {
              $input                    = $request->all();
              $input['user_id']         = Auth::id();
              $device                   = Nugget::create($input);

              return response()->json(['status'=>'success', 'data'=>$device], 200);
            }catch (QueryException $e)
            {
                  $response["error"] = $e;
            }

          }
          return response()->json($response);
    }



}
