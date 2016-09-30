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

<div class="col-xs-12"></div>
	<h2>Paradas</h2>
	<div class="content-panel">
	  <h4><i class="fa fa-angle-right"></i> Incidencias similares del mismo conductor</h4>
	  <section id="no-more-tables">
	      <table class="table table-bordered table-striped table-condensed cf">
	          <thead class="cf">
	          <tr>
	              <th>Parada</th>
	              <th>Opciones</th>
	          </tr>
	          </thead>
	          <tbody>

	          @foreach ($paradas as $parada)
	          <tr>
	              <td data-title="Ruta"><a href="{{route('paradas.show',[$parada->idParada])}}">{{ $parada->nombre }}</td>
	              <td data-title="Unidad" class="text-center">
	              	
	              	{!! Form::submit('Eliminar parada', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}

	              </td>
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
