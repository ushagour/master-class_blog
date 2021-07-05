@extends('layouts.app')
   @section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @stop
@section('content')

<div class="card">
    <div class="card-header">
    <h2>        Create New post </h2>
    </div>
    <div class="card-body">
    @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="form-group">

                <label for="title">Title</label>

                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">

                <label for="featured">Featured image</label>

                <input type="file" name="featured" class="form-control" id="featured">
            </div>

<div class="form-group">


<label for="category">select a Categoory</label>


<select name="category_id" id="category" class="form-control">

@foreach($categories as $category)

<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach

</select>
</div>
<div class="form-group">


<label for="tags">select Tags</label>



@foreach($tags as $tag)
<div class="checkbox">


 <label for="tag"><input type="checkbox"  name="selectedtags[]" value="{{$tag->id}}" id="tag"> {{$tag->tag}}</label>
</div>
@endforeach

</div>

            <div class="form-group">

                <label for="content">Content</label>
                <div class="form-group">
                  <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">ok</button>
                </div>
            </div>

        </form>

    </div>

</div>
@stop

    @section('scrypts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


        <script>

        

    </script>
    @stop
