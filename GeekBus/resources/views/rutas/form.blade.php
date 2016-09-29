<div class="form-group">
    {!! Form::label('nombre', 'Ruta:'); !!}
    {!!  Form::text('nombre'); !!}
</div>
<div class="form-group">
   {!! Form::label('loginKey', 'Descripción:'); !!}
    {!!  Form::text('loginKey'); !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>

{!! Form::close() !!}