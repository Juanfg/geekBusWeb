@extends('layouts.sidebar')

@section('title', 'Conductores')

@section('content')
<h2> Conductores </h2>
<p> Los conductores son las personas encargadas de manejar y cuidar tus unidades. Por eso es muy importante identificarlos de manera &uacute;nica. En esta secci&oacute;n podr&aacute;s modificar a tus conductores e incluso crear nuevos.</p> 


<div class="col-sm-12"> 
{!! Form::model(new App\Conductor, ['route' => ['choferes.store']]) !!}
@include('conductores.form', ['submit_text' => 'crear'])
</div>






@endsection

