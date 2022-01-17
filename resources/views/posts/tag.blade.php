<x-app-layout>
	<div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
		<h1 class="text-3xl font-bold text-gray-600 mb-4 uppercase">Etiqueta: {{ $tag->name }}</h1>

		@foreach ($posts as $post)
			<x-card-post :post="$post"/>
		@endforeach

		<div class="mt-4">
			{{ $posts->links() }}
		</div>
	</div>
</x-app-layout>