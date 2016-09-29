<div class="form-group">
    {!! Form::label('nombre', 'Nombre del conductor:'); !!}
    {!!  Form::text('nombre'); !!}
</div>
<div class="form-group">
   {!! Form::label('loginKey', 'Llave de acceso:'); !!}
    {!!  Form::text('loginKey'); !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>

{!! Form::close() !!}
