<div class="form-group">
    {!! Form::label('nombre', 'Ruta:'); !!}
    {!!  Form::text('nombre'); !!}
</div>
<div class="form-group">
   {!! Form::label('descripcion', 'Descripción:'); !!}
    {!!  Form::text('descripcion'); !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>

{!! Form::close() !!}