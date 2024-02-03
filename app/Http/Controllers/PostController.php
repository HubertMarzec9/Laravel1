<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'body' => 'required',
            'category_id' => ['required', 'numeric', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['category_id'] = (int)$attributes['category_id'];
        $attributes['slug'] = str_replace(' ', '-', $attributes['title']);
        $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');


        //ddd($attributes);
        Post::create($attributes);

        return redirect('/');
    }
}
