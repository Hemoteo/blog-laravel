@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin/posts/partials/form')

                <div class="form-group">
                    {!! Form::button('<i class="fas fa-plus mr-1"></i> Crear post', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
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