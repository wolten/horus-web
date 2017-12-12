@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1>{{ $proyecto->nombre }}</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                  @if($modulos->count() > 0)
                      @inject('modules','App\Http\Controllers\MonitorCtrl')

                      <table class="table table-condensed table-bordered">
                        <tr>
                          <th>Modulo</th>
                          <th>Flujometro</th>
                          <th>Nivel</th>
                          <th>Bomba</th>
                          <th>UV</th>
                        </tr>
                      @foreach($modulos as $modulo)
                        <tr>
                          <td>{{ $modulo->nombre }}</td>
                          <?php $ultimos10Eventos = $modules->getUltimoEvento($modulo->id, 10); ?>
                          @foreach($ultimos10Eventos AS $evento)
                              <td>{{ $evento->type_id }}</td>
                          @endforeach
                        </tr>
                      @endforeach

                      </table>

                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
