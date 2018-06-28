@extends('main')

@section('title', '| Blog')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center mb-5 mt-5">Blog</h1>
    </div>
  </div>

@foreach ($posts as $post)
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>{{ $post->title }}</h2>
      <span>Published: {{  date('M j, Y', strtotime($post->created_at))}}</span>
      <article class="text-justify pt-3">
            <p>{{ substr(strip_tags($post->body) , 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-outline-secondary">Read More</a>
            <hr>
      </article>

    </div>
  </div>
  @endforeach

  <div class="row">
    <div class="col-md-12">
      <div class="text-center mx-auto">
          {!! $posts->links() !!}
      </div>
    </div>
  </div>
@endsection
