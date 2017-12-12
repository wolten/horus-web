<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Nugget;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProyectoCtrl extends Controller
{

  public function __construct(){      $this->middleware('auth');  }



  public function index()
  {
    $proyectos = Proyecto::where('user_id', Auth::id())->get();

    return view('proyectox.index',compact('proyectos'));
  }

  public function create()
  {     return view('proyectox.nuevo');   }


  public function store(Request $request)
  {

          $validator = Validator::make($request->all(), [
                      'nombre' => 'required|max:255',
                      'descripcion' => 'required',
                  ]);

          if ($validator->fails())
          {
              return redirect::back()
                          ->withErrors($validator)
                          ->withInput();
          }

          try
          {
            $input                    = $request->all();
            $input['user_id']         = Auth::id();
            $proyecto = Proyecto::create($input);
            #return response()->json(['status'=>'success', 'data'=>$proyecto], 200);
            return redirect('proyectos');


          }catch (QueryException $e)
          {
                $response["error"] = $e;
          }



        return response()->json($response);

  }

  public function viewr($id)
  {
    $proyecto = Proyecto::where('id',$id)->first();
    $dispositivos = Nugget::where('proyecto_id',$id)->get();

    return view('proyectox.view',compact('proyecto','dispositivos'));
  }



}# END OF CLASS
