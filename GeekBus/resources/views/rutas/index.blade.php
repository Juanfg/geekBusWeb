@extends('layouts.sidebar')

@section('title', 'Conductores')

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
  <h2> Rutas </h2>
  <p> En esta secci&oacute;n podr&aacute;s agregar, modificar, eliminar y editar las rutas que toman los camiones</p>
      <div class="content-panel">
		  <h4><i class="fa fa-angle-right"></i> Rutas</h4>
          <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                  <tr>
                      <th>ID Ruta</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($rutas as $ruta)
                  <tr>
                      <td data-title="ID Ruta">{{ $ruta->idRuta }}</td>
                      <td data-title="Nombre"><a href="{{ route('rutas.show', [$ruta->idRuta]) }}">{{ $ruta->nombre }}</a></td>
                      <td data-title="Descripcion">{{ $ruta->descripcion }}</td>
                      <td data-title="Acciones">
                            <div class="col-xs-2 col-xs-offset-3">
                              {!! Form::open( [ 'method' => 'GET', 'route'=>['rutas.edit', $ruta->idRuta]]) !!}
                              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                              {!! Form::close() !!}
                            </div>
                            <div class="col-xs-2">
                              {!! Form::open( [ 'method' => 'DELETE', 'route'=>['rutas.destroy', $ruta->idRuta]]) !!}
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
        {!! Form::open( [ 'method' => 'GET', 'route' =>['rutas.create']]) !!}
        {!! Form::submit('Agregar una ruta', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
		</div>
  </div><!-- /col-lg-12 -->



@endsection

