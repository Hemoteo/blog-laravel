<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = Category::pluck('name', 'id'); // array de categorías
        $tags = Tag::all(); // colección de etiquetas
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create(['url' => $url]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.posts.index', compact('post'))->with('info', 'El post se ha creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post): View
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id'); // array de categorías
        $tags = Tag::all(); // colección de etiquetas

        return view('admin.posts.edit', compact('post'), compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $this->authorize('author', $post);

        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update(['url' => $url]);
            } else {
                $post->image()->create(['url' => $url]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.posts.edit', compact('post'))->with('info', 'El post se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('author', $post);

        $post->delete();

        Cache::flush();

        return redirect()->route('admin.posts.index', compact('post'))->with('info', 'El post se ha eliminado con éxito');
    }

    public function validation(Request $request, Post $post = null): void
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts'.($post ? ',slug,'.$post->id : ''),
        ]);
    }
}
