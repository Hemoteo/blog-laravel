@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <div class="float-right">
        @include('admin/tags/partials/delete')
    </div>

    <h1>Editar etiqueta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}
                @include('admin/tags/partials/form')

                <div class="form-group">
                    {!! Form::button('<i class="far fa-save mr-1"></i> Actualizar etiqueta', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
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