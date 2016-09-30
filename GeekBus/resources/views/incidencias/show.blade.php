<?php 
	$evento = $incidencia->evento;
	$conductor = App\Conductor::where('idConductor', $evento->conductor)->firstOrFail();
	$similar = DB::table('Incidencias')->join('Eventos','Eventos.idEvento', 'Incidencias.idEvento')->where('conductor', $conductor->idConductor)->where('idTipoEvento', $evento->idTipoEvento)->where('idIncidencia', '<>', $incidencia->idIncidencia)->join('Camiones','Camiones.idCamion','Eventos.idCamion')->join('Rutas','Camiones.idRuta','Rutas.idRuta')->select('Rutas.idRuta','Rutas.nombre as ruta', 'Camiones.idCamion', 'Camiones.unidad','Eventos.valor')->get();
 ?>

@extends('layouts.sidebar')

@section('title', 'Incidencias')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="col-xs-12">
    <img src="{{Storage::url($conductor->fotoPath)}}" class="img-responsive col-xs-12 col-sm-4 col-sm-offset-4 img-thumbnail">
</div>
<h1 class="text-center">{{$conductor->nombre}}</h1>
<p class="text-center">
	@if( $sesion = App\Conductor::activeRoute( $conductor->idConductor ) )
	    Conduciendo Ruta {{ $sesion->camion->ruta->nombre }} Unidad {{ $sesion->camion->unidad }}
	@else
	    No esta manejando en este momento
	@endif
</p>
<p class="text-center"><strong>Incidencia: {{ App\TipoEvento::incidentDescription($evento->idTipoEvento)}}</strong></p>
<p class="text-center">Cantidad de eventos similares {{$similar->count()}}</p>
<p class="text-center">Ocurrido en la fecha: {{$evento->fechahora}}</p>
<p class="text-center"><a href="{{route('rutas.show',[$evento->camion->ruta->idRuta])}}">Ruta {{$evento->camion->ruta->nombre}}</a></p>
<p class="text-center"><a href="{{route('autobuses.show',[$evento->camion->idCamion])}}">Unidad {{$evento->camion->unidad}}</a></p>

<div class="content-panel">
  <h4><i class="fa fa-angle-right"></i> Incidencias similares del mismo conductor</h4>
  <section id="no-more-tables">
      <table class="table table-bordered table-striped table-condensed cf">
          <thead class="cf">
          <tr>
              <th>Ruta</th>
              <th>Unidad</th>
              <th>Valor de la incidencia</th>
          </tr>
          </thead>
          <tbody>

          @foreach ($similar as $incidenciaL)
          <tr>
              <td data-title="Ruta"><a href="{{route('rutas.show',[$incidenciaL->idRuta])}}">{{ $incidenciaL->ruta }}</td>
              <td data-title="Unidad"><a href="{{route('autobuses.show',[$incidenciaL->idCamion])}}">{{ $incidenciaL->unidad }}</a></td>
              <td data-title="Valor de la incidencia">{{ $incidenciaL->valor }}</td>
          </tr>
          @endforeach
          </tbody>
      </table>
  </section>
</div><!-- /content-panel -->
<br>
<div class="col-xs-12">
	
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['incidencias.index'], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Volver', ['class' => 'btn btn-info btn-block']) !!}
		{!! Form::close() !!}
	</div><div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'DELETE',
   		 'route' =>['incidencias.destroy', $incidencia->idIncidencia], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Eliminar esta incidencia', ['class' => 'btn btn-danger btn-block']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'DELETE',
   		 'route' =>['incidencias.destroyAll', $incidencia->idIncidencia], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Eliminar todas las similares', ['class' => 'btn btn-danger btn-block']) !!}
		{!! Form::close() !!}
	</div>
</div>
@endsection
