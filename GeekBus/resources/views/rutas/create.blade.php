@extends('layouts.sidebar')

@section('title', 'Rutas')

@section('content')
<h2> Rutas </h2>
<p> Las rutas son los caminos que toman cualquiera de tus unidades. Es importante escribir una descripci&oacute;n adecuada para tener una mejor idea de las paradas de la misma.</p> 


<div class="col-sm-12"> 
{!! Form::model(new App\Ruta, ['route' => ['rutas.store']]) !!}
@include('rutas.form', ['submit_text' => 'Crear ruta'])
</div>

@endsection

