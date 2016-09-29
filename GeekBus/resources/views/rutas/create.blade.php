@extends('layouts.sidebar')

@section('title', 'Rutas')

@section('content')
<h2> Agregar una ruta </h2>
<p> En esta sección se pueden a&ntilde;adir las diferentes rutas por las que los autobuses van a pasar. Procura hacer una descripci&oacute; bastante detallada de la ruta para futuras referencias, as&iacute; como el nombre espec&iacute;fico de la misma. </p> 


<div class="col-sm-12"> 
{!! Form::model(new App\Ruta, ['route' => ['rutas.store']]) !!}
@include('rutas.form', ['submit_text' => 'Crear ruta'])
</div>

@endsection

