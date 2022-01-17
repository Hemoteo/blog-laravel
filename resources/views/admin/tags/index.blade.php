@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    @can('admin.tags.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.tags.create') }}">
            <i class="fas fa-plus mr-1"></i> Nueva etiqueta
        </a>
    @endcan

    <h1>Lista de etiquetas</h1>
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
                        <th scope="col">Color</th>
                        <th scope="col" colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->color }}</td>
                            <td style="width: 1px">
                                @can('admin.tags.edit')
                                    <a class="btn btn-primary btn-sm mr-2 text-nowrap" href="{{ route('admin.tags.edit', $tag) }}">
                                        <i class="fas fa-edit mr-1"></i> Editar
                                    </a>
                                @endcan
                            </td>
                            <td style="width: 1px">
                                @can('admin.tags.destroy')
                                    @include('admin/tags/partials/delete')
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop