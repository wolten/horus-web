@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Nuevo proyecto</div>

                <div class="panel-body p-2">



                  <!-- DOIT -->
                  {!! Form::open(['method' => 'POST']) !!}


                    <div class="form-group">
                      {!! Form::label('nombre', 'Nombre:'); !!}
                      {!! Form::text('nombre', null,['class'=>'form-control', 'placeholder'=>'Proyecto asombroso']); !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('descripcion', 'Descripcion:'); !!}
                      {!! Form::textarea('descripcion', null,['class'=>'form-control', 'placeholder'=>'Aqui la descripcion del proyecto']); !!}
                    </div>


                    <div class="form-group">
                        <button type="button" id="btnStoreProyecto" class="btn btn-success">
                          <i class="fa fa-send-o"></i>
                          Crear proyecto
                        </button>
                    </div>

                    <div id="mensaje" class='p-2'></div>

                  {!! Form::close() !!}






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
