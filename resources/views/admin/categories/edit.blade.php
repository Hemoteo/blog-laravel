@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <div class="float-right">
        @include('admin/categories/partials/delete')
    </div>

    <h1>Editar categoría</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
                @include('admin/categories/partials/form')

                <div class="form-group">
                    {!! Form::button('<i class="far fa-save mr-1"></i> Actualizar categoría', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#name').stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection