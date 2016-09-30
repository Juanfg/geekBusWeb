@extends('layouts.sidebar')

@section('title', 'Paradas')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

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
@endsection
