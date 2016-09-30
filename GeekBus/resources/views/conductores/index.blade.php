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
                  <tr>
                      <td data-title="ID Conductor">AAC</td>
                      <td data-title="Nombre">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                      <td data-title="Actividad">AAC</td>
                      <td data-title="Acciones">
          	              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                      </td>
                  </tr>
                  </tbody>
              </table>
          </section>
      </div><!-- /content-panel -->
      	<br>
      	<div align="right">
			<button type="button" class="btn btn-success">Agregar Chofer</button>
		</div>
  </div><!-- /col-lg-12 -->


@endsection

