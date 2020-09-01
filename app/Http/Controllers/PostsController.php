<?php

namespace App\Http\Controllers;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {

      // If any tags are send via the request then it will filter by that tag
      // This would be sent when you click a link like so 
      // <a href="/posts?tag={{ $tag->name }}"> post link here {{ $tag->name }} </a>
      //          Or if you named your index route 
      // <a href=" {{ route('posts'index', ['tag' => $tag->name]) }}"
      if (request('tag')) {
        $posts = Post::where('name', request('tag'))->firstOrFail()->posts;
      } else {
        $posts = Post::latest()->get();
      }

      return view('posts.index', [
        'posts' => Post::latest()->get()
      ]);
    }

    public function show(Post $post)
    {
      // Other methods below
      // We use the model Post, so laravel recognizes the data type
      // $post = Post::find($slug);
      // 'post' => Post::where('slug', $slug)->firstOrFail()
      return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      Post::create($this->validatePost());
      return redirect('/posts');
    }

    public function edit(Post $post)
    {
      return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
      $post->update($this->validatePost());
      // Original method commented, path method in model
      // return redirect('/posts/' . $post->slug);
      return redirect($post->path());
    }

    protected function validatePost(){
      return request()->validate([
        'title' => 'required',
        'body' => 'required',
        'tags' => 'exists:tags.id',
      ]);
    }
}
