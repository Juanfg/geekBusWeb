@extends('layouts.sidebar')

@section('title', 'Rutas')

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

<h2> Agregar una ruta </h2>
<p> En esta sección se pueden a&ntilde;adir las diferentes rutas por las que los autobuses van a pasar. Procura hacer una descripci&oacute; bastante detallada de la ruta para futuras referencias, as&iacute; como el nombre espec&iacute;fico de la misma. </p> 


<div class="col-sm-12"> 
{!! Form::model(new App\Ruta, ['route' => ['rutas.store']]) !!}
@include('rutas.form', ['submit_text' => 'Crear'])
</div>

@endsection

