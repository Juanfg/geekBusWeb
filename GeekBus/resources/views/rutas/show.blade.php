@extends('layouts.sidebar')

@section('title', 'Paradas')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<h1 class="text-center">{{$ruta->nombre}}</h1>
<p class="text-center"><strong>ID Ruta: </strong>{{$ruta->idRuta}}</p>
<p class="text-center"><strong>Descripci&oacute;n: </strong>{{$ruta->descripcion}}</p>
<br>
<div class="col-xs-12">
	
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['rutas.index']
   		 ])  !!}
		{!! Form::submit('Volver', ['class' => 'btn btn-info btn-block']) !!}
		{!! Form::close() !!}
	</div><div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['rutas.edit', $ruta->idRuta], 
   		 ])  !!}
		{!! Form::submit('Editar', ['class' => 'btn btn-warning btn-block']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'DELETE',
   		 'route' =>['rutas.destroy', $ruta->idRuta], 
   		 ])  !!}
		{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-block']) !!}
		{!! Form::close() !!}
	</div>

</div>
@endsection
