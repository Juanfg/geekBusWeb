@extends('layouts.sidebar')

@section('title', 'Conductores')

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
<p class="text-center"><strong>Llave de logueo: </strong>{{$conductor->loginKey}}</p>
<p class="text-center">
	@if( $sesion = App\Conductor::activeRoute( $conductor->idConductor ) )
	    Conduciendo Ruta {{ $sesion->camion->ruta->nombre }} Unidad {{ $sesion->camion->unidad }}
	@else
	    No esta manejando en este momento
	@endif
</p>
<br>
<div class="col-xs-12">
	
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['choferes.index'], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Volver', ['class' => 'btn btn-info btn-block']) !!}
		{!! Form::close() !!}
	</div><div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['choferes.edit', $conductor->idConductor], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Editar', ['class' => 'btn btn-warning btn-block']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'DELETE',
   		 'route' =>['choferes.destroy', $conductor->idConductor], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-block']) !!}
		{!! Form::close() !!}
	</div>

</div>
@endsection
