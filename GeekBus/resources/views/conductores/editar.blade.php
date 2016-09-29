@extends('layouts.sidebar')

@section('title', 'Conductores')

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

<h2> Editar conductor </h2>
<p> Aqu&iacute; podr&aacute;s editar a un conductor. <br> Si cambias la llave de un conductor este no podr&aacute; iniciar con su clave anterior</p>


<div class="col-sm-12"> 
{!! Form::model($conductor,
    [
    'method' => 'PUT',
    'route' =>['choferes.update', $conductor->idConductor], 
    'files' => 'true'
    ]) !!}
@include('conductores.form', ['submit_text' => 'Editar'])
</div>
@endsection