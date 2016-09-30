<div class="form-panel">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Inserta la informaci&oacute;n</h4>
		<div class="form-group">
		    {!! Form::label('nombre', 'Nombre del conductor:'); !!}
		    {!!  Form::text('nombre'); !!}
		</div>
		<div class="form-group">
		   {!! Form::label('loginKey', 'Llave de acceso:'); !!}
		    {!!  Form::text('loginKey'); !!}
		</div>
		<div class="form-group">
		   {!! Form::label('loginKey', 'Foto del conductor:'); !!}
		    {!! Form::file('image') !!}
		</div>
		<div class="form-group">
		    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
		</div>
</div>
{!! Form::close() !!}
