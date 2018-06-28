@extends('main')

@section('title', "| $tag->name Tag ")

@section('content')


<section>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1>{{$tag->name}} Tag <span class="badge badge-pill badge-info">{{$tag->posts()->count()}} Posts</span></h1>
      </div>
      {{-- End of Col-md-7 --}}

      <div class="col-md-2">
        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block" style="margin-top:10px;">Edit</a>
      </div>
      {{-- End of col-md-4 --}}

      <div class="col-md-2">
        {{ Form::open(['route'=> ['tags.destroy', $tag->id], 'method'=> 'DELETE']) }}


        {{ Form::button('<i class="fas fa-trash-alt fa-sm"></i>', ['class' => 'btn btn-danger btn-block','style' =>'margin-top:10px;', 'type' => 'submit']) }}
        {{-- {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' =>'margin-top:10px;']) }} --}}

        {{ Form::close() }}
      </div>
      {{-- End of col-md-4 --}}
    </div>

    <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
        <tr>
          <th class="green">id</th>
          <th class="green">Title</th>
          <th class="green">Tags</th>
          <th class="green"> Actions</th>
        </tr>
    </thead>

    <tbody>

        @foreach($tag->posts as $post)
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td> @foreach($post->tags as $tag)
                <span class="badge badge-info">{{ $tag->name }}</span>
            @endforeach
            </td>
            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm"> View</a></td>
          </tr>
        @endforeach

    </tbody>
    </table>

    </div>

    </div>

  </div>
</section>

@endsection
