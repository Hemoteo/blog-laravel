<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del post', 'autocomplete' => 'off']) !!}

	@error('name')
		<span class="text-danger">{{ $message }}</span>
	@enderror
</div>

<div class="form-group">
	{!! Form::label('slug', 'Slug') !!}
	{!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Escriba el slug del post', 'readonly']) !!}

	@error('slug')
		<span class="text-danger">{{ $message }}</span>
	@enderror
</div>

<div class="form-group">
	{!! Form::label('category_id', 'Categoría') !!}
	{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

	@error('category_id')
		<span class="text-danger">{{ $message }}</span>
	@enderror
</div>

<div class="form-group">
	<p class="font-weight-bold">Etiquetas</p>

	@foreach ($tags as $tag)
		<label class="font-weight-normal mr-3">
			{!! Form::checkbox('tags[]', $tag->id, null) !!}
			{{ $tag->name }}
		</label>
	@endforeach

	@error('tags')
		<div class="text-danger">{{ $message }}</div>
	@enderror
</div>

<div class="row mb-3">
	<div class="col">
		<div class="image-wrapper">
			@isset ($post->image)
				<img id="picture" src="{{ Storage::url($post->image->url) }}" alt="Imagen del post">
			@else
				<img id="picture" src="https://cdn.pixabay.com/photo/2021/12/19/12/27/road-6881040_960_720.jpg" alt="Imagen por defecto">
			@endisset
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			{!! Form::label('file', 'Imagen del post') !!}
			{!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

			@error('file')
				<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore optio accusamus animi nulla aspernatur fugit asperiores assumenda cum, libero ratione quod corporis laboriosam sapiente inventore modi et id ullam quisquam?</p>
	</div>
</div>

<div class="form-group">
	{!! Form::label('extract', 'Extracto') !!}
	{!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

	@error('extract')
		<span class="text-danger">{{ $message }}</span>
	@enderror
</div>

<div class="form-group">
	{!! Form::label('body', 'Contenido del post') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

	@error('body')
		<span class="text-danger">{{ $message }}</span>
	@enderror
</div>

<div class="form-group">
	<p class="font-weight-bold">Estado</p>

	<label class="font-weight-normal mr-3">
		{!! Form::radio('status', 1, true) !!}
		Borrador
	</label>
	<label class="font-weight-normal">
		{!! Form::radio('status', 2, false) !!}
		Publicado
	</label>

	@error('status')
		<div class="text-danger">{{ $message }}</div>
	@enderror
</div>