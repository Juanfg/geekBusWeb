<div class="form-group">
    {!! Form::label('nombre', 'Nombre de la parada:'); !!}
    {!!  Form::text('nombre'); !!}
</div>
<div class="form-group">
    {!! Form::label('lat', 'Latitud:'); !!}
    {!!  Form::text('lat'); !!}
</div>
<div class="form-group">
   {!! Form::label('long', 'Longitud:'); !!}
    {!!  Form::text('long'); !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>

{!! Form::close() !!}
