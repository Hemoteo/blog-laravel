@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary btn-sm float-right">
        <i class="fas fa-plus mr-1"></i> Nuevo post
    </a>

    <h1>Lista de posts</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    @livewire('admin.posts-index')

    {{-- <div class="bg-yellow-600"></div>
    <div class="bg-purple-600"></div>
    <div class="bg-green-600"></div>
    <div class="bg-blue-600"></div>
    <div class="bg-pink-600"></div> --}}
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // console.log('Hi!');
    </script>
@stop