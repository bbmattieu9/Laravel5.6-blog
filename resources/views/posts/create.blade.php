@extends('main')

@section('title', ' | Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script type="text/javascript">
         tinymce.init({
           selector: 'textarea',
           plugins:'link  code',
           menubar:false
           // toolbar:'undo redo | cut copy paste'
         });
    </script>
@endsection

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto">
      <div class="card">
      <h3 class="card-header text-center">Create New Post</h3>
     <div class="card-block">

       {!! Form::open(array('route'=> 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
           {{ Form::label('title', 'Title:') }}
           {{ Form::text('title', null, array('class' => 'form-control', 'required'=> '', 'maxlength'=>'200'))  }}

           {{ Form::label('slug', "Slug:", ['class'=>' form-spacing-top'])}}
           {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength'=> '5', 'maxlength' =>'255'))}}

           {{ Form::label('category_id','Category:')}}
           <select class="form-control" name="category_id">
             @foreach($categories as $category)
             <option value="{{$category->id}}">{{ $category->name }}</option>
             @endforeach
           </select>

           {{ Form::label('tags','Tags:')}}
           <select class="form-control select2-multi" name="tags[]" multiple="multiple">
             @foreach($tags as $tag)
             <option value="{{$tag->id}}">{{ $tag->name }}</option>
             @endforeach
           </select>

           {{ Form::label('featured_image', 'Upload Image:')}}
           {{ Form::file('featured_image') }}


           {{ Form::label('body', "Post Body:", ['class'=> ' form-spacing-top']) }}
           {{ Form::textarea('body', null, array('class' => 'form-control')) }}

           {{ Form::submit('Create Post', array('class'=>'btn btn-primary btn-block form-spacing-top')) }}
       {!! Form::close() !!}

     </div>
   </div>
   </div>
   </div>
  </div>
</section>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@endsection