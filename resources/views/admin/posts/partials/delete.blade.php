<form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
	@csrf
	@method('delete')
	<button type="submit" class="btn btn-danger btn-sm text-nowrap">
		<i class="far fa-trash-alt mr-1"></i> Eliminar
	</button>
</form>