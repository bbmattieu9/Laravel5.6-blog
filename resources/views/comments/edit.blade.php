@extends('main')

@section('title'. '| Edit Comment')

@section('content')

  <section>
      <div class="container">
        <div class="col-md-8 mx-auto">
          <h3 class="text-center">Edit Comment</h3>

          {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'METHOD'=>'PUT'])}}

              {{ Form::label('name', 'Name:') }}
              {{ Form::text('name', null, ['class' => 'form-control'])}}

              {{ Form::label('email', 'Email:') }}
              {{ Form::text('email', null, ['class' => 'form-control']) }}

              {{ Form::label('comment', 'Comment:') }}
              {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

              {{ Form::submit('Update Comment', ['class'=> 'btn btn-block btn-outline-success', 'style'=>'margin-top:15px;']) }}

          {{  Form::close() }}
        </div>
      </div>
  </section>

@endsection
