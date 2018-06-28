@extends('main')

@section('title', ' | Contact')

@section('content')
    <div class="row">
      <div class="col-12">
        <h1>Contact Më</h1>
        <hr>
        <form action="{{ url('contact') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" />
          </div>

          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" />
          </div>
          <div class="form-group">
         <label for="message">Your Message</label>
         <textarea class="form-control" id="message" name="message" rows="3"></textarea>
       </div>
       <input type="submit" value="Send Message" class="btn btn-primary">
        </form>
      </div>
    </div>
@endsection
