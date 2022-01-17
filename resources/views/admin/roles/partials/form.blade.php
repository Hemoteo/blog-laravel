<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del rol', 'autocomplete' => 'off']) !!}

	@error('name')
		<span class="text-danger">{{ $message }}</span>
	@enderror
</div>

<div class="form-group">
	<div class="h5">Permisos</div>

	@foreach ($permissions as $permission)
		<div>
			<label>
				{!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
				{{ $permission->description }}
			</label>
		</div>
	@endforeach
</div>