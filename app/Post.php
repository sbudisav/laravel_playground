<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
  public function complete() {
    $this->completed = true;
    $this->save();
  }

  public function getRouteKeyName() {
    return 'slug';
  }

  public function path() {
    // This becomes a method called via $post->path()
    // I can reference post.show because I named this route in web.php
    return route('post.show', $this);
  }

  public function user(){
    //This will create a method post->user() that returns 
    //a user instance for who wrote the post

    //If user has been deleted will return deleted user
    return $this->belongsTo(User::class, 'user_id')->withDefault([
        'name' => '[deleted user]',
    ]); 
  }

  public function tags(){
    return $this->belongsToMany(Tag::class)->withTimeStamps();
  }

  protected $fillable = ['title', 'body', 'slug'];
  
}
