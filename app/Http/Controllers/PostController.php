<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Session;
use Purifier;
use Image;
use App\Category;

class PostController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a variable and store all the post in it
        $posts = Post::orderBy('id', 'desc')->paginate(4);

        //return a view nd pass it in the above get_class_varsret
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate data
        $this->validate($request, array(
          'title'=> 'required|max:255',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id' => 'required|integer',
          'body' => 'required',
          'featured_image' => 'sometimes|image'
        ));

        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        //save the post image
        if($request->hasFile('featured_image'))
        {
          $image = $request->file('featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(640, 450)->save($location);

          $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        //Set flash message
        Session::flash('success', 'The blog was successfully saved!');

        //redirect user to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the db and save it in a get_class_vars
        //return the view and pass it in the var previously created

        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
          $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
          $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //validate data

      $post = Post::find($id);
      // if ($request->input('slug') == $post->slug)
      //  {
      //    $this->validate($request, array(
      //      'title'=> 'required|max:255',
      //      'body' => 'required'
      //    ));
      // }

        $this->validate($request, array(
        'title'=> 'required|max:255',
        'slug'=> "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
        'category_id' => 'required|integer',
        'body' => 'required',
        'featured_image' =>'image'
      ));


      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->slug = $request->input('slug');
      $post->category_id = $request->input('category_id');
      $post->body = $request->input('body');

      if($request->hasFile('featured_image'))
      {
        //Delete the old foto
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(640, 450)->save($location);

        $oldFilename = $post->image;

        //Delete old image
        Storage::delete($oldFilename);

      }
      $post->save();

      if (isset($request->tags))
       {
          $post->tags()->sync($request->tags);
      }
      else
      {
        $post->tags()->sync(array());
      }

      Session::flash('success', 'Post was updated Successfully!');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success', 'Post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
