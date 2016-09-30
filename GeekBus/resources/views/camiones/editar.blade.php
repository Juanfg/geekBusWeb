@extends('layouts.sidebar')

@section('title', 'Camiones')

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

<h2> Editar camiones </h2>
<p> Aqu&iacute; podr&aacute;s editar un camion.</p>


<div class="col-sm-12"> 
{!! Form::model($camion,
    [
    'method' => 'PUT',
    'route' =>['autobuses.update', $camion->idCamion]
    ]) !!}
@include('camiones.form', ['submit_text' => 'Editar'])
</div>
@endsection