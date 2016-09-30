@extends('layouts.sidebar')

@section('title', 'Incidencias')

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
  <h2> Incidencias </h2>
  <p> En esta secci&oacute;n podr&aacute;s ver reportes sobre un comportamiento indebido en tus unidades. Usa el boton de eliminar similares para eliminar los registros de ese conductor de ese mismo tipo. Toma en cuenta que recibimos informaci&oacute;n muy seguido, por lo que aparecer&aacute; informaci&oacute;n aparemente duplicada</p>
      <div class="content-panel">
		  <h4><i class="fa fa-angle-right"></i> Incidencias</h4>
          <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                  <tr>
                      <th>Ruta</th>
                      <th>Unidad</th>
                      <th>Conductor</th>
                      <th>Tipo de incidencia</th>
                      <th>Valor de la incidencia</th>
                      <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($incidencias as $incidencia)

                  <tr>
                      <td data-title="Ruta">{{ $incidencia->evento->camion->ruta->nombre }}</td>
                      <td data-title="Unidad"><a href="{{route('autobuses.show',[$incidencia->evento->camion->idCamion])}}">{{ $incidencia->evento->camion->unidad }}</a></td>
                      <td data-title="Conductor"><a href="{{route('choferes.show',[App\Conductor::find($incidencia->evento->conductor)->idConductor])}}">{{ App\Conductor::find($incidencia->evento->conductor)->nombre }}</a></td>
                      <td data-title="Tipo de incidencia"><a href="{{route('incidencias.show',[ $incidencia->idIncidencia ]) }}">{{ App\TipoEvento::incidentDescription($incidencia->evento->idTipoEvento)}}</a></td>
                      <td data-title="Valor de la incidencia">{{ $incidencia->evento->valor }}</td>
                      <td data-title="Accion">
                            <div class="col-xs-2 col-xs-offset-2">
                            {!! Form::open( [ 'method' => 'DELETE', 'route'=>['incidencias.destroy', $incidencia->idIncidencia]]) !!}
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
  </div><!-- /col-lg-12 -->


@endsection

