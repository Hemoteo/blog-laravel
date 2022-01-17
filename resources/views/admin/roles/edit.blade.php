@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <div class="float-right">
        @include('admin/roles/partials/delete')
    </div>

    <h1>Editar rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
                @include('admin/roles/partials/form')

                <div class="form-group">
                    {!! Form::button('<i class="far fa-save mr-1"></i> Actualizar rol', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop