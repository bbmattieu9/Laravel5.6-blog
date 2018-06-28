@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag ")

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto">
        <h1>{{ $post->title }}</h1>
        <small class="text-muted">Author: <span class="badge badge-info badge-pill"> </span> | <small>Posted on</small> <span class="badge badge-info">{{date('M j Y ', strtotime($post->created_at))}}</span> </small>
        <br>
        <small class="text-muted">Category: <span class="badge badge-info badge-pill">{{ $post->category->name }}</small></p>
          @if(!is_null($post->image))
            <img src="{{ asset('images/' . $post->image) }}" width="640" height="450" alt="article image">
          @endif

        <article class="mx-auto">
          <p class="text-justify mt-2">{!! $post->body !!}</p>
          {{-- <p><span class="text-muted">Category: {{ $post->category->name }}.</span></p> --}}
          <div class="tags">
            Tags:
            @foreach ($post->tags as $tag)
              <span class="badge badge-pill badge-info">{{ $tag->name }}</span>
            @endforeach
          </div>
        </article>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7 mx-auto">
        <h4 class="mb-4"><i class="far fa-comment-alt fa-sm"></i> {{ $post->comments()->count()}} Comments</h4>
        @foreach($post->comments as $comment)
            <div class="comment">
              <div class="author-info">
                <img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))) ."?s=100&d=monsterid"  }}" alt="avatar" class="author-image float-md-left">
                <div class="author-name">
                  <h6>{{ $comment->name }}</h6>
                  <p class="author-time">{{ date('F nS, Y @ g:i A', strtotime($comment->created_at))}}</p>
                </div>
              </div>
              <div class="comment-content">
                {{$comment->comment}}
              </div>
            </div>
        @endforeach
      <hr>

        {{-- Loop through comments and print it out here --}}
      </div>
    </div>


    <div class="row">
        <div id="comment-form" class="col-md-7 mx-auto" style="margin-top:30px;">
            {{ Form::open(['route'=> ['comments.store', $post->id], 'method' => 'POST']) }}

              <div class="row">
                <div class="col-md-6">
                  {{ Form::label('name', 'Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control'])}}
                </div>

                <div class="col-md-6">
                  {{ Form::label('email', 'Email:') }}
                  {{ Form::text('email', null, ['class' => 'form-control'])}}
                </div>

                <div class="col-md-12">
                  {{ Form::label('comment', 'Comment:') }}
                  {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows'=>'5'])}}
                </div>


                <div class="col-md-12">
                    {{ Form::submit('Add Comment', ['class' => 'btn btn-primary btn-block' , 'style' => 'margin-top:15px;']) }}
                </div>
              </div>

            {{ Form::close() }}
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-8 mx-auto">
            {{ Html::linkRoute('home', 'Back to Blogs',[],['class'=> 'btn btn-secondary btn-block '])}}
        </div>
    </div> --}}
  </div>
</section>

@endsection
