<div class="form-panel">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Inserta la informaci&oacute;n</h4>
		<div class="form-group">
		    {!! Form::label('idRuta', 'Ruta:'); !!}
		    {!!  Form::number('idRuta'); !!}
		</div>
		<div class="form-group">
		   {!! Form::label('unidad', 'Unidad:'); !!}
		    {!!  Form::text('unidad'); !!}
		</div>
		<div class="form-group">
		   {!! Form::label('capacidadMaxima', 'Capacidad M&aacute;xima:'); !!}
		    {!! Form::number('capacidadMaxima') !!}
		</div>
		<div class="form-group">
		   {!! Form::label('asientos', 'Asientos:'); !!}
		    {!! Form::number('asientos') !!}
		</div>
		<div class="form-group">
		   {!! Form::label('velMax', 'Velocidad M&aacute;xima:'); !!}
		    {!! Form::number('velMax') !!}
		</div>
		<div class="form-group">
		   {!! Form::label('rpmMax', 'RPM M&aacute;xima:'); !!}
		    {!! Form::number('rpmMax') !!}
		</div>
		<div class="form-group">
		   {!! Form::label('macAddress', 'Direcci&oacute;n MAC'); !!}
		    {!! Form::text('macAddress') !!}
		</div>
		<div class="form-group">
		    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
		</div>
</div>
{!! Form::close() !!}
