@extends('layouts.sidebar')

@section('title', 'Administradores')

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
  <h2> Administradores </h2>
  <p> En esta secci&oacute;n podr&aacute;s agregar y eliminar administradores de la base de datos.</p>
      <div class="content-panel">
		  <h4><i class="fa fa-angle-right"></i> Administradores</h4>
          <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                  <tr>
                      <th>ID Admin</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($admin as $admin)

                  <tr>
                      <td data-title="ID Admin">{{ $admin->id }}</td>
                      <td data-title="Nombre">{{ $admin->name }}</td>
                      <td data-title="Email">{{ $admin->email }}</a></td>
                      <td data-title="Accion">
                            <div class="col-xs-2">
                              {!! Form::open( [ 'method' => 'DELETE', 'route'=>['admins.destroy', $admin->id]]) !!}
                              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                              {!! Form::close() !!}
                            </div>
                        </td>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
          </section>
      </div><!-- /content-panel -->
      	<br>
      	<div align="right">
          {!! Form::open( [ 'method' => 'GET', 'url' =>['register']]) !!}
          {!! Form::submit('A&ntilde;adir administrador', ['class' => 'btn btn-success']) !!}
          {!! Form::close() !!}
		    </div>
  </div><!-- /col-lg-12 -->


@endsection

