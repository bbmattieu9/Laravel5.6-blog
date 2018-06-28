<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
      return $this->belongsToMany('App\Post');
    }

    // public function allRelatedIds()
    // {
    //     return $this->tags->pluck('id');
    // }

}
