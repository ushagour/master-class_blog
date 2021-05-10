@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        create new post
    </div>
    <div class="panel-body">
    @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
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

                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
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
