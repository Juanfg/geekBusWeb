@extends('layouts.sidebar')

@section('title', 'Camiones')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; width: 100%;}
</style>
<h1 class="text-center">Unidad {{$camion->unidad}}</h1>
<p class="text-center"><strong>Ruta: </strong><a href="{{route('rutas.show', [ $camion->ruta->idRuta ])}}">{{$camion->ruta->nombre}}</a></p>
<p class="text-center"><strong>ID Camion: </strong>{{$camion->idCamion}}</p>
<p class="text-center">
  <strong>
    @if(App\Camion::activo($camion->idCamion))
    Este cami&oacute;n est&aacute; en ruta actualmente
    @else
    Este cami&oacute;n no esta haciendo un recorrido
    @endif
  </strong> 
</p>
@if($ubicacion)
<p class="text-center"><strong>Latitud: </strong>{{$ubicacion->lat}}</p>
<p class="text-center"><strong>Longitud: </strong>{{$ubicacion->long}}</p>
@else
<p class="text-center"><strong>Aun no hay informaci&oacute;n de ubicaci&oacute;n</p>
@endif
<p class="text-center"><strong>Asientos: </strong>{{$camion->asientos}}</p>
<p class="text-center"><strong>Capacidad Maxima: </strong>{{$camion->capacidadMaxima}}</p>
<p class="text-center"><strong>RPM Maxima: </strong>{{$camion->rpmMax}}</p>
<p class="text-center"><strong>Velocidad Maxima: </strong>{{$camion->velMax}}</p>
<p class="text-center"><strong>Direccion MAC: </strong>{{$camion->macAddress}}</p>
<br>
<div class="col-xs-12">
	
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['autobuses.index']
   		 ])  !!}
		{!! Form::submit('Volver', ['class' => 'btn btn-info btn-block']) !!}
		{!! Form::close() !!}
	</div><div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['autobuses.edit', $camion->idCamion], 
   		 ])  !!}
		{!! Form::submit('Editar', ['class' => 'btn btn-warning btn-block']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'DELETE',
   		 'route' =>['autobuses.destroy', $camion->idCamion], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-block']) !!}
		{!! Form::close() !!}
	</div>

</div>

<div class="col-xs-12 row">
	<div id="map" style="height:500px;"></div>
</div>

@if($ubicacion)
<script type="text/javascript">
var map;
function initMap() {
  var myLatLng =  {lat: {{$ubicacion->lat}}, lng: {{$ubicacion->long}} };

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}

</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_9PZAZmSz49MCe2lMaWKhd7zq9vy8o7E&callback=initMap">
</script>
@endif
@endsection
