@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-title">
    <h2>        update  post : {{$post->id}}
</h2>
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
        <form action="{{route('post.update',['id'=> $post->id])}}" method="post" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="form-group">

                <label for="title">Title</label>

                <input type="text" class="form-control" name="title" value="{{$post->title}}" id="title">
            </div>
            <div class="form-group">

                <label for="featured">Featured image</label>

                <input type="file" name="featured" class="form-control" id="featured">
            </div>

<div class="form-group">


<label for="category">select a Categoory</label>


<select name="category_id" id="category" class="form-control">

@foreach($categories as $category)

<option value="{{$category->id}}"  {{ ($category->id) == $post->category_id ? 'selected' : '' }}   >{{$category->name}}</option>  
<!-- fixing problem of selected option by defult  -->
@endforeach

</select>
</div>

            <div class="form-group">

                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30"  rows="10" class="form-control"> {{$post->content}}</textarea>
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
