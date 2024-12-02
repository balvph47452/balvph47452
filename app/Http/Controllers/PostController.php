<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()->limit(6)->orderByDesc('view')->get();

        $query = Post::query();

        
        return view('home', compact('posts'));
    }

    public function list()
    {
        $posts = Post::query()
            ->paginate(9);
        return view('posts', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::query()->find($id);

        return view('detail', compact('post'));
    }

    public function about($id)
    {
        $cates = Category::query()->find($id);
        $posts = $cates->posts()->paginate(9);

        return view('about', compact('posts', 'cates'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');


        $posts = Post::query()
            ->where('title', 'like', "%{$query}%")
            // ->orWhere('description', 'like', "%{$query}%")
            ->paginate(9);

        return view('search', compact('posts'));
    }
}
