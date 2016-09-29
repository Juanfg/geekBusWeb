@extends('layouts.sidebar')

@section('title', 'Paradas')

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

<h2> Crear paradas </h2>
<p> Aqu&iacute; podr&aacute;s crear paradas </p>


<div class="col-sm-12"> 
{!! Form::model(new App\Parada, ['route' =>'paradas.store', 'files' => 'true' ]) !!}
@include('paradas.form', ['submit_text' => 'Crear'])
</div>
@endsection