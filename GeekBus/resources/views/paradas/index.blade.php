@extends('layouts.sidebar')

@section('title', 'Paradas')

@section('content')

<div class="col-lg-12">
	<h2> Paradas </h2>
	<p> En esta secci&oacute;n podr&aacute;s agregar, modificar, eliminar y editar las paradas</p>

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
                      <td data-title="ID Ruta">AAC</td>
                      <td data-title="Nombre">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                      <td data-title="Descripcion">AAC</td>
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

