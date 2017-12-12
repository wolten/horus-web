@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

      <div class="col-sm-2 col-md-2">

        <div class="panel panel-primary">
          <div class="panel-heading">Control</div>
          <div class="panel-body">

            <a href="{{ url('proyecto/dispositivo/nuevo',$proyecto->id) }}" rel="{{ $proyecto->id }}">
              <i class="fa fa-plus"></i> Nuevo modulo
            </a> <br>

            <a href="{{ url('proyecto/monitor',$proyecto->id) }}">
              <i class="fa fa-dashboard"></i> Monitor
            </a>

          </div>
        </div>
      </div>

      <div class="col-sm-10 col-md-10">

          <div class="panel panel-primary">
            <div class="panel-heading">{{ $proyecto->nombre }}</div>
            <div class="panel-body">

                @if( $dispositivos)
                    <table class='table table-bordered table-condesed'>
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Numero de serie</th>
                          <th>Ultima vez actualizado</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($dispositivos AS $device)
                          <tr id="list-item-{{ $device->id }}">
                            <td>{{ $device->nombre }}</td>
                            <td>{{ $device->numeroSerie}}</td>
                            <td>{{ $device->updated_at }}</td>
                            <td>
                              {!! Form::open(['method' => 'POST']) !!}
                              {!! Form::hidden('dispositivo', $device->id); !!}
                              <!-- Single button -->
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#" id="btnDeleteModulo" data-id="{{ $device->id }}">Eliminar</a></li>
                                  </ul>
                                </div>
                              {!! Form::close() !!}
                            </td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                @endif

            </div>
          </div>

      </div>
    </div>
</div>
@endsection
