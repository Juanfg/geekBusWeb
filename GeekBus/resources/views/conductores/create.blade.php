@extends('layouts.sidebar')

@section('title', 'Conductores')

@section('content')

<h2> Crear conductor </h2>
<p> Aqu&iacute; podr&aacute;s crear a un conductor. <br> La llave de acceso es la llave que tendr&aacute;s que dar a tu conductor para que inicie sesi&oacute;n </p>


<div class="col-sm-12"> 
{!! Form::model(new App\Conductor, ['route' => ['choferes.store']]) !!}
@include('conductores.form', ['submit_text' => 'Crear'])
</div>
@endsection