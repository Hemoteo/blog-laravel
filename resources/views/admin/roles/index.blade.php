@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    @can('admin.roles.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.roles.create') }}">
            <i class="fas fa-plus mr-1"></i> Nuevo rol
        </a>
    @endcan

    <h1>Lista de roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rol</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td style="width: 1px">
                                @can('admin.roles.edit')
                                    <a class="btn btn-primary btn-sm mr-2 text-nowrap" href="{{ route('admin.roles.edit', $role) }}">
                                        <i class="fas fa-edit mr-1"></i> Editar
                                    </a>
                                @endcan
                            </td>
                            <td style="width: 1px">
                                @can('admin.roles.destroy')
                                    @include('admin/roles/partials/delete')
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop