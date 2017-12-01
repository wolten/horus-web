@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

      <div class="col-sm-2 col-md-2">

        <div class="panel panel-primary">
          <div class="panel-heading">Control</div>
          <div class="panel-body">

            <a href="{{ url('proyecto/dispositivo/nuevo',$proyecto->id) }}" rel="{{ $proyecto->id }}">
              <i class="fa fa-plus"></i> Nuevo Dispositivo
            </a> <br>

            <a href="{{ url('monitor',$proyecto->id) }}">
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
                          <tr>
                            <td>{{ $device->nombre }}</td>
                            <td>{{ $device->numeroSerie}}</td>
                            <td>{{ $device->updated_at }}</td>
                            <td>
                              <a href="" class="btn btn-primary">Opciones</a>
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
