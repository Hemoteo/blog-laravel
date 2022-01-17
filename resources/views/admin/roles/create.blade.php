@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                @include('admin/roles/partials/form')

                <div class="form-group">
                    {!! Form::button('<i class="fas fa-plus mr-1"></i> Crear rol', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop