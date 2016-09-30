@extends('layouts.sidebar')

@section('title', 'Rutas')

@section('content')

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

<h2> Editar rutas </h2>
<p> Aqu&iacute; podr&aacute;s editar a un rutas.</p>


<div class="col-sm-12"> 
{!! Form::model($ruta,
    [
    'method' => 'PUT',
    'route' =>['rutas.update', $ruta->idRuta], 
    'files' => 'true'
    ]) !!}
@include('rutas.form', ['submit_text' => 'Editar'])
</div>
@endsection