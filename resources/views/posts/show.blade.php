@extends('main')

@section('title', ' | View Post')

@section('content')

  <section>
    <div class="container">

  <div class="row">

  <div class="col-md-8 mt-3">
    <h1>{{ $post->title }}</h1>
    <small class="text-muted">Author: <span class="badge badge-info badge-pill"> {{  Auth::user()->name }}</span> | <small>Posted on</small> <span class="badge badge-info">{{date('M j Y ', strtotime($post->created_at))}}</span> </small>
    <br>
    <small class="text-muted">Category: <span class="badge badge-info badge-pill">{{ $post->category->name }}</small></p>
    <hr/>
  <article class="text-justify">
   {!! $post->body !!}
  </article>

  <hr>
  <div class="tags">
    Tags:
    @foreach ($post->tags as $tag)
      <span class="badge badge-pill badge-info">{{ $tag->name }}</span>
    @endforeach
  </div>
  </div>
  {{-- End of 8 col --}}


  <div class="col-md-4 mt-3">
    <div class="card">
    <div class="card-header text-center">Post Info</div>
    <div class="card-body text-dark p-3">
      <dl class="text-center">
        <dt>Url:</dt>
        <dd><a href="{{ route('blog.single', $post->slug) }}">{{route('blog.single', $post->slug)}}</a></dd>
      </dl>

      <dl class="text-center">
        <dt>Created At:</dt>
        <dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
      </dl>

      <dl class="text-center">
        <dt>Updated At:</dt>
        <dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
      </dl>
      <hr/>
      <div class="row">
        <div class="col-md-6 mt-2">
          {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=> 'btn btn-block btn-primary')) !!}
        </div>

        <div class="col-md-6 mt-2">
          {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
          {!! Form::close() !!}
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-12">
            {{ Html::linkRoute('posts.index', 'View All Posts',[],['class'=> 'btn btn-secondary btn-block '])}}
        </div>
      </div>


    </div>
  </div>

  </div>
  </div>

  <div id="backend-comment">
    <h4>Comments <span class="badge badge-pill badge-info">{{ $post->comments()->count() }}</span></h4>

          <table class="table">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                 <th>
                  Email
                </th>
                <th>
                  Comment
                </th>
                <th>action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($post->comments as $comment)
               <tr>
                 <td>{{$comment->name}}</td>
                 <td>{{$comment->email}}</td>

                 <td> {{ substr($comment->comment, 0 , 90) }}{{ strlen($comment->comment) > 50 ? "..."  : '' }}</td>
                 <td>
                   <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-outline-dark"><i class="far fa-edit"></i></a>
                   <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger-sm"><i class="far fa-trash-alt"></i></a>
                 </td>
               </tr>
             @endforeach
            </tbody>
          </table>
  </div>

  </div>
  </section>

@endsection
