@extends('layouts.sidebar')

@section('title', 'Camiones')

@section('content')

@if (session('deleted'))
    <div class="alert alert-warning">
        {{ session('deleted') }}
    </div>
@endif
@if (session('failDeleted'))
    <div class="alert alert-danger">
        {{ session('failDeleted') }}
    </div>
@endif

<div class="col-lg-12">
  <h2> Camiones </h2>
  <p> En esta secci&oacute;n podr&aacute;s agregar, modificar la informaci&oacute;n, y eliminar camiones de la base de datos.</p>
      <div class="content-panel">
		  <h4><i class="fa fa-angle-right"></i> Camiones</h4>
          <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                  <tr>
                      <th>ID Cami&oacute;n</th>
                      <th>Ruta</th>
                      <th>Unidad</th>
                      <th>Asientos disponibles</th>
                      <th>Velocidad</th>
                      <th>RPM</th>
                      <th>MAC Address</th>
                      <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($camiones as $camion)

                  <tr>
                      <td data-title="ID Camion">{{ $camion->idCamion }}</td>
                      <td data-title="Ruta">{{ $camion->ruta->nombre }}</td>
                      <td data-title="Unidad">{{ $camion->unidad }}</td>
                      <td data-title="Asientos">{{ $camion->asientos }}</td>
                      <td data-title="Velocidad">{{ $camion->velMax }}</td>
                      <td data-title="RPM">{{ $camion->rpmMax }}</td>
                      <td data-title="MAC Address">{{ $camion->macAddress }}</td>
                      <td data-title="Accion">
                            <div class="col-xs-2 col-xs-offset-3">
                              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                              {!! Form::close() !!}
                            </div>
                            <div class="col-xs-2">
                              {!! Form::open( [ 'method' => 'DELETE', 'route'=>['autobuses.destroy', $camion->idCamion]]) !!}
                              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                              {!! Form::close() !!}
                            </div>
                        </td>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
          </section>
      </div><!-- /content-panel -->
      	<br>
      	<div align="right">
          {!! Form::open( [ 'method' => 'GET', 'route' =>['autobuses.create']]) !!}
          {!! Form::submit('A&ntilde;adir cami&oacute;n', ['class' => 'btn btn-success']) !!}
          {!! Form::close() !!}
		    </div>
  </div><!-- /col-lg-12 -->


@endsection

