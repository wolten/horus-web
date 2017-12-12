@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Nuevo dispositivo</div>

                <div class="panel-body p-2">
                  <p>Estas creado un nuevo dispositivo para el proyecto <b>{{ $proyecto->nombre }}</b> </p>


                  <!-- DOIT -->
                  {!! Form::open(['method' => 'POST','route'=>'device.store']) !!}
                    {!! Form::hidden('proyecto_id', $proyecto->id); !!}

                    <div class="form-group">
                      {!! Form::label('nombre', 'Nombre:'); !!}
                      {!! Form::text('nombre', null,['class'=>'form-control', 'placeholder'=>'Modulo TESTER']); !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('numeroSerie', 'No serie:'); !!}
                      {!! Form::text('numeroSerie', null,['class'=>'form-control', 'placeholder'=>'WHM00MX0050041300001']); !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('proyecto', 'Proyecto:'); !!}
                      {!! Form::text('proyecto_id', $proyecto->nombre,['class'=>'form-control','disabled'=>'true']); !!}
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                          <i class="fa fa-floppy-o"></i>
                          Crear dispositivo
                        </button>
                    </div>

                    <div id="mensaje" class='p-2'>

                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                    </div>

                  {!! Form::close() !!}






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
