<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    // public function author()
    // {
    // 	return $this->belongsTo('App\User');
    // }

    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}
