@extends('layouts.sidebar')

@section('title', 'Conductores')

@section('content')
<div class="col-lg-12">
  <h2> Camiones </h2>
  <p> En esta secci&oacute;n podr&aacute;s agregar, modificar la informaci&oacute;n, y eliminar camiones de la base de datos.</p>
      <div class="content-panel">
		  <h4><i class="fa fa-angle-right"></i> Camiones</h4>
          <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                  <tr>
                      <th>ID Cami&oacute;n</th>
                      <th>Ruta</th>
                      <th>Unidad</th>
                      <th>Asientos disponibles</th>
                      <th>Velocidad</th>
                      <th>RPM</th>
                      <th>MAC Address</th>
                      <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td data-title="ID Camion">AAC</td>
                      <td data-title="Ruta">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                      <td data-title="Unidad">AAC</td>
                      <td data-title="Asientos">AAC</td>
                      <td data-title="Velocidad">AAC</td>
                      <td data-title="RPM">AAC</td>
                      <td data-title="MAC Address"></td>
                      <td data-title="Accion">
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

