@extends('layouts.sidebar')

@section('title', 'Conductores')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2> Crear conductor </h2>
<p> Aqu&iacute; podr&aacute;s crear a un conductor. <br> La llave de acceso es la llave que tendr&aacute;s que dar a tu conductor para que inicie sesi&oacute;n </p>


<div class="col-sm-12"> 
{!! Form::model(new App\Conductor, ['route' =>'choferes.store', 'files' => 'true' ]) !!}
@include('conductores.form', ['submit_text' => 'Crear'])
</div>
@endsection