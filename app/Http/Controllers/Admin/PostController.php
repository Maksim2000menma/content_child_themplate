<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);

        return view('admin/post/index', compact('posts'));
    }

    public function create()
    {
        return view('admin/post/create');
    }

    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect('/admin/posts');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin/post/edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/admin/posts/');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/admin/posts');
    }
}