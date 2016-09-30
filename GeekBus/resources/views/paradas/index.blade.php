@extends('layouts.sidebar')

@section('title', 'Paradas')

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
	<h2> Paradas </h2>
	<p> En esta secci&oacute;n podr&aacute;s agregar, modificar, eliminar y editar las paradas</p>
      <div class="content-panel">
		  <h4><i class="fa fa-angle-right"></i> Paradas</h4>
          <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                  <tr>
                      <th>ID Parada</th>
                      <th>Nombre</th>
                      <th>Latitud</th>
                      <th>Longitud</th>
                      <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($paradas as $parada)
                  <tr>
                      <td data-title="ID Parada">{{ $parada->idParada }}</td>
                      <td data-title="Nombre"><a href="{{ route('paradas.show', [$parada->idParada]) }}">{{ $parada->nombre }}</a></td>
                      <td data-title="Latitud">{{ $parada->lat }}</td>
                      <td data-title="Longitud">{{ $parada->long }}</td>
                      <td data-title="Acciones">
          	              <div class="col-xs-2 col-xs-offset-3">
                              {!! Form::open( [ 'method' => 'GET', 'route'=>['paradas.edit', $parada->idParada]]) !!}
                              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                              {!! Form::close() !!}
                            </div>
                            <div class="col-xs-2">
                              {!! Form::open( [ 'method' => 'DELETE', 'route'=>['paradas.destroy', $parada->idParada]]) !!}
                              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                              {!! Form::close() !!}
                            </div>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
          </section>
      </div><!-- /content-panel -->
      	<br>
      	<div align="right">
			{!! Form::open( [ 'method' => 'GET', 'route' =>['paradas.create']]) !!}
            {!! Form::submit('Agregar parada', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
		</div>
  </div><!-- /col-lg-12 -->






@endsection
