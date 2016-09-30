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
  <h2> Choferes </h2>
  <p> En esta secci&oacute;n podr&aacute;s agregar, modificar la informaci&oacute;n, y eliminar a los choferes de la base de datos</p>
      <div class="content-panel">
		  <h4><i class="fa fa-angle-right"></i> Choferes</h4>
          <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                  <tr>
                      <th>ID Conductor</th>
                      <th>Nombre</th>
                      <th>Actividad</th>
                      <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($conductores as $conductor)
                    <tr>
                        <td data-title="ID Conductor">{{ $conductor->idConductor }}</td>
                        <td data-title="Nombre">{{ $conductor->nombre }}</td>
                        <td data-title="Actividad">
                          @if( $sesion = App\Conductor::activeRoute( $conductor->idConductor ) )
                              Ruta {{ $sesion->camion->ruta->nombre }} Unidad {{ $sesion->camion->unidad }}
                          @else
                              No
                          @endif
                        </td>
                        <td data-title="Acciones">
                            <div class="col-xs-2 col-xs-offset-3">
                              {!! Form::open( [ 'method' => 'GET', 'route'=>['choferes.edit', $conductor->idConductor]]) !!}
                              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                              {!! Form::close() !!}
                            </div>
                            <div class="col-xs-2">
                              {!! Form::open( [ 'method' => 'DELETE', 'route'=>['choferes.destroy', $conductor->idConductor]]) !!}
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
        {!! Form::open( [ 'method' => 'GET', 'route' =>['choferes.create']]) !!}
        {!! Form::submit('Crear conductor', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
		</div>
  </div><!-- /col-lg-12 -->


@endsection

