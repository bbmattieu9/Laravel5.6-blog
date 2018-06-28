@extends('main')

@section('title', '| Login')

@section('content')
  <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 mx-auto">
                <h2 class="text-center login-title">Cerutti.io sign in</h2>
                <div class="account-wall">
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">

                    {!! Form::open(array('route' => 'loggin', 'class' => 'form-signin')) !!}

                      {{-- {{ Form::label('email', 'Email:') }} --}}
                      {{-- {{ Form::email('email', null, array('placeholder'=>'Email'),['class'=> 'form-control']) }} --}}
                      {{ Form::email('email', '',array('class'=>'form-control', 'placeholder'=>'  Email', 'autofocus' => 'autofocus')) }}

                      {{-- {{ Form::label('password', 'Password:') }} --}}
                      {{-- {{ Form::password('password', '',array('class'=>'form-control', 'placeholder'=>'  Password')) }} --}}
                      {{-- {{ Form::password('password',['class'=> 'form-control']) }} --}}
                      {{ Form::password('password', ['placeholder' => 'Password', 'class'=> 'form-control']) }}

                      {{-- {{ Form::checkbox('remember') }}{{ Form::label('remember', 'Remember Me') }} --}}
                      <label class="checkbox pull-left">
                          <input type="checkbox" value="remember-me">
                          Remember me
                      </label>


                      {{ Form::submit('Login', ['class' => 'btn btn-submit btn-block']) }}

                      <a href="#" class="pull-right need-help">Forgot Password </a><span class="clearfix"></span>

                      {!! Form::close() !!}

                </div>
                <a href="#" class="text-center new-account">Create an account </a>
            </div>
        </div>
    </div>
  </section>




{{--
    {!! Form::open(array('route' => 'loggin'),['class' => 'form-signin']) !!}

      {{ Form::label('email', 'Email:') }}
      {{ Form::email('email', null, ['class'=> 'form-control']) }}

      {{ Form::label('password', 'Password:') }}
      {{ Form::password('password',['class'=> 'form-control']) }}

      {{ Form::checkbox('remember') }}{{ Form::label('remember', 'Remember Me') }}


      {{ Form::submit('Login', ['class' => 'submit']) }}

      <p class="text-center mt-2"><a href="#" class="btn">Forgot password?</a> | <a href="#" class="btn">Become A Member</a></p> --}}





@endsection
