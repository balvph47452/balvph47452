<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function listPost(){
        $posts = Post::query()->orderByDesc('id')->paginate(10);

        return view('admin.posts.list', compact('posts'));
    }

    public function create(){
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(StoreRequest $request){
        // dd($request->all());
        $data = $request->except('image');

        //upload anh
        if($request->hasFile('image')) {
            $path_image = $request->file('image')->store('image');
            $data['image'] = $path_image;
        }

        Post::query()->create($data);

        return redirect()->route('posts.list')
        ->with('message', 'Them du lieu thanh cong');
    }

    public function destroy($id) {
        $post = Post::find($id);
    
        if (!$post) {
            return redirect()->route('posts.list')->with('error', 'Post not found.');
        }
    
        // If the post exists, delete it
        $post->delete();
    
        return redirect()->route('posts.list')->with('message', ' successfully.');
    }
    

    public function edit($id) {
        $post = Post::find($id);
    
        if (!$post) {
            return redirect()->route('posts.list')->with('error', 'Post not found.');
        }
    
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->price = $request->input('price');
    
        // Handle image update
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/posts');
            // Delete the old image if it exists
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }
            $post->image = $imagePath;
        }
    
        $post->save();
    
        return redirect()->route('posts.list')->with('message', 'Product updated successfully!');
    }
    

    public function detail($id) {
        $post = Post::query()->findOrFail($id);

        return view('admin.posts.detail', compact('post'));
    }
}
