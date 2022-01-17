<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(): View
    {
        $key = 'posts';

        if (request()->page) {
            $key .= request()->page;
        }

        if (Cache::has($key)) {
            $posts = Cache::get($key);
        } else {
            $posts = Post::where('status', 2)->latest('id')->paginate(8);
            Cache::put($key, $posts);
        }

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        $this->authorize('published', $post);

        // if (Cache::has('relatedPosts')) {
        //     Cache::get('relatedPosts');
        // } else {
            $relatedPosts = Post::where('category_id', $post->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $post->id)
                            ->latest('id')
                            ->take(4)->get();
        //     Cache::put('relatedPosts', $relatedPosts);
        // }

        return view('posts.show', compact('post', 'relatedPosts'));
    }

    public function category(Category $category): View
    {
        $posts = Post::where('category_id', $category->id)
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(3);
        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag): View
    {
        $posts = $tag->posts()
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(3);
        return view('posts.tag', compact('posts', 'tag'));
    }
}
