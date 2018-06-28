@extends('main')

@section('title', '| All Categories')

@section('content')


<div class="container">
  <div class="row">

<div class="col-md-8 mx-auto">

  <h1 class="text-center">All Categories</h1>

  <table class="table">
    <thead>
    <tr>
      <th class="green">#</th>
      <th class="green">Name</th>
    </tr>
</thead>

<tbody>

    @foreach($categories as $category)
      <tr>
        <th>{{ $category->id }}</th>
        <td>{{ $category->name }}</td>
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
      <h4 class="card-title text-center">Create New</h4>
      {!! Form::open(['route' => 'categories.store', 'method'=>'POST']) !!}
      {{ Form::label('name', 'Name:', ['class'=> 'form-spacing-top'])}}
      {{ Form::text('name', null, ['class'=> 'form-control']) }}

      {{ Form::submit('Create New Category', ['class' => 'btn btn-secondary btn-block form-spacing-top']) }}

      {!! Form::close() !!}
    </div>

  </div>
</div>
</div>
</div>

@endsection
