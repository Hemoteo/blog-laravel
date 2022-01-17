<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Escriba el nombre del post">
    </div>

    @if ($posts->count())
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
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td style="width: 1px">
                                <a class="btn btn-primary btn-sm mr-2 text-nowrap" href="{{ route('admin.posts.edit', $post) }}">
                                    <i class="fas fa-edit mr-1"></i> Editar
                                </a>
                            </td>
                            <td style="width: 1px">
                                @include('admin/posts/partials/delete')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
