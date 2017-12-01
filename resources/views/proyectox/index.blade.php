@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Opciones</div>

                <div class="panel-body">
                      <a href="{{ url('proyecto','nuevo') }}">Nuevo</a>
                </div>
            </div>
        </div>


        <div class="col-md-10">


          <div class="panel panel-primary">
              <div class="panel-heading">Proyectos</div>
              <div class="panel-body">

                @if($proyectos->count() > 0)
                  <table class="table">
                    <tr>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Creado</th>
                    </tr>
                    @foreach($proyectos AS $proyecto)
                          <tr>
                            <td>
                              <a href="{{ url('proyecto',$proyecto->id) }}">
                                {{ $proyecto->nombre }}
                              </a>
                            </td>
                            <td>{{ $proyecto->descripcion }}</td>
                            <td>{{ \Carbon\Carbon::parse($proyecto->created_At)->toFormattedDateString() }}</td>
                          </tr>
                    @endforeach
                  </table>
                @else
                  <p class="alert alert-info">Aún no creas ningún proyecto</p>
                @endif


              </div>
          </div>

        </div>


    </div>
</div>
@endsection
