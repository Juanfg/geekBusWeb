@extends('layouts.sidebar')

@section('title', 'Paradas')

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
<h1 class="text-center">{{$parada->nombre}}</h1>
<p class="text-center"><strong>ID Parada: </strong>{{$parada->idParada}}</p>
<p class="text-center"><strong>Latitud: </strong>{{$parada->lat}}</p>
<p class="text-center"><strong>Longitud: </strong>{{$parada->long}}</p>
<br>
<div class="col-xs-12">
	
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['paradas.index']
   		 ])  !!}
		{!! Form::submit('Volver', ['class' => 'btn btn-info btn-block']) !!}
		{!! Form::close() !!}
	</div><div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['paradas.edit', $parada->idParada], 
   		 ])  !!}
		{!! Form::submit('Editar', ['class' => 'btn btn-warning btn-block']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'DELETE',
   		 'route' =>['paradas.destroy', $parada->idParada], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-block']) !!}
		{!! Form::close() !!}
	</div>

</div>
<div class="col-xs-12">
	<div id="map" style="height:500px;"></div>
</div>
<script type="text/javascript">

var map;
function initMap() {
  var myLatLng =  {lat: {{$parada->lat}}, lng: {{$parada->long}} };

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
@endsection
