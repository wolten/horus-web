<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Nugget;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;



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
        if($request->ajax())
        {
          try
          {
            $input                    = $request->all();
            $input['user_id']         = Auth::id();
            $proyecto = Proyecto::create($input);
            return response()->json(['status'=>'success', 'data'=>$proyecto], 200);
          }catch (QueryException $e)
          {
                $response["error"] = $e;
          }

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
