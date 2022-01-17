<x-app-layout>
	<div class="container py-8">
		<h1 class="text-4xl font-bold text-gray-600 mb-4">{{ $post->name }}</h1>

		<div class="text-lg text-gray-500 mb-2">
			{!! $post->extract !!}
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
			{{-- Contenido principal --}}
			<div class="lg:col-span-2">
				<figure>
					<img class="w-full object-cover object-center" src="
						@if ($post->image)
							{{ Storage::url($post->image->url) }}
						@else
							https://cdn.pixabay.com/photo/2021/12/19/12/27/road-6881040_960_720.jpg
						@endif
						" alt="Imagen del post">
				</figure>

				<div class="text-base text-gray-500 mt-4">
					{!! $post->body !!}
				</div>
			</div>

			{{-- Contenido relacionado --}}
			<aside>
				<h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
				<ul>
					@foreach ($relatedPosts as $relatedPost)
						<li class="mb-4">
							<a class="flex" href="{{ route('posts.show', $relatedPost) }}">
								<img class="w-36 object-cover object-center" src="
									@if ($relatedPost->image)
										{{ Storage::url($relatedPost->image->url) }}
									@else
										https://cdn.pixabay.com/photo/2021/12/19/12/27/road-6881040_960_720.jpg
									@endif
									" alt="Imagen del post">
								<span class="w-64 ml-2 text-gray-600">{{ $relatedPost->name }}</span>
							</a>
						</li>
					@endforeach
				</ul>
			</aside>
		</div>
	</div>
</x-app-layout>