<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

  /*
  * Index Page for Blog
  */
  public function getIndex()
  {
    $posts = Post::orderBy('id', 'desc')->paginate(6);
    return view('blog.index')->withPosts($posts);
  }


    /*
    * Fetch A single Blog from the Blog
    */
    public function getSingle($slug)
    {
    //fetch from the Db on $slug
    $post = Post::where('slug', '=', $slug)->first();
    //return the view and pass in the post object
    return view('blog.single')->withPost($post);
    }
}
