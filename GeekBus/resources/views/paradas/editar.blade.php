@extends('layouts.sidebar')

@section('title', 'Paradas')

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

<h2> Editar paradas </h2>
<p> Aqu&iacute; podr&aacute;s editar una parada.</p>


<div class="col-sm-12"> 
{!! Form::model($parada,
    [
    'method' => 'PUT',
    'route' =>['paradas.update', $parada->idParada]
    ]) !!}
@include('paradas.form', ['submit_text' => 'Editar'])
</div>
@endsection