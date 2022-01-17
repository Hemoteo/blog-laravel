@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    @can('admin.categories.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.categories.create') }}">
            <i class="fas fa-plus mr-1"></i> Nueva categoría
        </a>
    @endcan

    <h1>Lista de categorías</h1>
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
                        <th scope="col">Nombre</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td style="width: 1px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm mr-2 text-nowrap" href="{{ route('admin.categories.edit', $category) }}">
                                        <i class="fas fa-edit mr-1"></i>Editar
                                    </a>
                                @endcan
                            </td>
                            <td style="width: 1px">
                                @can('admin.categories.destroy')
                                    @include('admin/categories/partials/delete')
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop