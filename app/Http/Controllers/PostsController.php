<?php

namespace App\Http\Controllers;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
      // $post = Post::find($slug);
      return view('posts.show', [
        'post' => Post::where('slug', $slug)->firstOrFail()
      ]);
    }

    public function index()
    {
      return view('posts.index', [
        'posts' => Post::latest()->get()
      ]);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      request()->validate([
        'title' => 'required', 
        'body' => 'required'
      ]);

      return redirect('posts.create');
    }

    public function edit($slug)
    {
      return view('posts.edit', [
        'post' => Post::where('slug', $slug)->firstOrFail()
      ]);
    }
}
