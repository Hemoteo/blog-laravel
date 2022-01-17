@extends('adminlte::page')

@section('title', 'Blog Laravel | Admin')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <p class="h5">Nombre</p>
                <p class="form-control">{{ $user->name }}</p>
            </div>

            <h2 class="h5">Listado de roles</h2>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                <div class="form-group">
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    {!! Form::button('<i class="far fa-save mr-1"></i> Asignar rol', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script>
    </script>
@endsection