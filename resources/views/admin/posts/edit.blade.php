@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <div class="float-right">
        @include('admin/posts/partials/delete')
    </div>

    <h1>Editar post</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
                @include('admin/posts/partials/form')

                <div class="form-group">
                    {!! Form::button('<i class="far fa-save mr-1"></i> Actualizar post', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    @include('admin/posts/partials/styles')
@endsection

@section('js')
    @include('admin/posts/partials/scripts')
@endsection