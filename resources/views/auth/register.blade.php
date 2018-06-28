@extends('main')

@section('title', ' New User Sign Up ')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
      <div class="col-md-6 mx-auto">
        {!! Form::open(array('route'=> 'registra', 'data-parsley-validate' => '')) !!}

          {{ Form::label('name', 'Name:', ['class'=>' form-spacing-top']) }}
          {{ Form::text('name', null, ['class'=> 'form-control']) }}

          {{ Form::label('username', 'Username:', ['class'=>' form-spacing-top']) }}
          {{ Form::text('username',null, ['class'=> 'form-control']) }}

          {{ Form::label('email', 'Email:', ['class'=>' form-spacing-top']) }}
          {{ Form::email('email',null, ['class'=> 'form-control']) }}

          {{ Form::label('password', 'Password:', ['class'=>' form-spacing-top']) }}
          {{ Form::password('password',['class'=> 'form-control']) }}

          {{ Form::label('password_confirmation', 'Confirm password:', ['class'=>' form-spacing-top']) }}
          {{ Form::password('password_confirmation',['class' => 'form-control']) }}


          {{ Form::submit('Register', ['class' => 'btn btn-secondary btn-block form-spacing-top']) }}

        {!! Form::close() !!}
      </div>
    </div>

@endsection
