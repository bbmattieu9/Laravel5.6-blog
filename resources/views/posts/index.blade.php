@extends('main')

@section('title', '| All Posts')

@section('content')

<section>


<div class="container">
<div class="row">

  <div class="col-md-9">
    <h1 class="text-center">All Posts</h1>
  </div>

  <div class="col-md-3">
    <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">Create New Post</a>
  </div>
  </div>

<div class="row">
<div class="col-md-12">
  <table class="table">
    <thead>
    <tr>
      <th class="green">id</th>
      <th class="green">Title</th>
      <th class="green">Body</th>
      <th class="green">Created At</th>
      <th class="green"> Actions</th>
    </tr>
</thead>

<tbody>

    @foreach($posts as $post)
      <tr>
        <th>{{ $post->id }}</th>
        <td>{{ substr($post->title, 0, 30) }}{{ strlen($post->title) > 30 ? "..."  : '' }}</td>
        <td>{!! substr($post->body, 0 , 50) !!}{!! strlen($post->body) > 50 ? "..."  : '' !!}</td>
        <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
        <td>
          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-dark"><i class="far fa-folder-open fa-sm"></i></a>
          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-dark"><i class="fas fa-edit fa-sm"></i></a>
        </td>
      </tr>
    @endforeach

</tbody>
</table>

</div>
<div class="text-center mx-auto">
  {!! $posts->links() !!}
</div>
</div>

</div>
</section>
@endsection
