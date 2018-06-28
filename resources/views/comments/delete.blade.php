@extends('main')

@section('title', '| Confirm Delete')


@section('content')

  <section>
    <div class="container">

      <div class="col-md-8 mx-auto">

        <h3>Confirm Delete</h3>
          <p>{{$comment->name}}</p>
          <p>{{$comment->email}}</p>
          <p>{{$comment->comment}}</p>

          {{ Form::open(['route'=> ['comments.destroy', $comment->id], 'method'=> 'DELETE']) }}

          {{ Form::button('<i class="fas fa-trash-alt fa-sm"></i>', ['class' => 'btn btn-danger btn-block','style' =>'margin-top:10px;', 'type' => 'submit']) }}
          {{-- {{ Form::submit('YES DELETE COMMENT', ['class' => 'btn btn-danger btn-block', 'style' =>'margin-top:10px;']) }} --}}

          {{ Form::close() }}
      </div>



    </div>
  </section>

@endsection
