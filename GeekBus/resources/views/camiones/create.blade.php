@extends('layouts.sidebar')

@section('title', 'Camiones')

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


<div class="col-sm-12"> 
<h2> A&ntilde;adir cami&oacute;n </h2>
<h3> Aqu&iacute; podr&aacute;s a&ntilde;adir un cami&oacute;n a la base de datos. <br> Procura que todos los datos se inserten de manera correcta para futuras referencias. Podr&aacute;s editar m&aacute;s tarde</h3>
<br>
{!! Form::model(new App\Conductor, ['route' =>'autobuses.store', 'files' => 'true' ]) !!}
@include('camiones.form', ['submit_text' => 'Crear'])
</div>
@endsection