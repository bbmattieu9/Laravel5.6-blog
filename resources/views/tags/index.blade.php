@extends('main')

@section('title', '| All Tags')

@section('content')


<div class="container">
  <div class="row">

<div class="col-md-8 mx-auto">

  <h1 class="text-center">All Tags</h1>

  <table class="table">
    <thead>
    <tr>
      <th class="green">#</th>
      <th class="green">Name</th>
    </tr>
</thead>

<tbody>

    @foreach($tags as $tag)
      <tr>
        <th>{{ $tag->id }}</th>
        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
        {{-- <td>
          <a href="{{ route('') }}" class="btn btn-outline-primary">Action 1</a>
          <a href="{{ route('') }}" class="btn btn-outline-secondary">Action 2</a>
        </td> --}}
      </tr>
    @endforeach

</tbody>
</table>

</div>
<!-- End of Col-8 -->



<div class="col-md-3 mx-auto">
  <div class="card p-3">
    <div class="card-body">
      <h4 class="card-title text-center">Create New Tag</h4>
      {!! Form::open(['route' => 'tags.store', 'method'=>'POST']) !!}
      {{ Form::label('name', 'Name:', ['class'=> 'top-spacing'])}}
      {{ Form::text('name', null, ['class'=> 'form-control']) }}

      {{ Form::submit('Create New Tag', ['class' => 'btn btn-secondary btn-block form-spacing-top']) }}

      {!! Form::close() !!}

    </div>

  </div>
</div>
</div>
</div>

@endsection
