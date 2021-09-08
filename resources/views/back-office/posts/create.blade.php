@extends('layouts.dashboard')


@section('content')

<div class="card">
    <div class="card-header">
        <h2> Create New post </h2>
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


                <div class="row">
                    <div class="col">
                        @foreach($tags as $tag)


                        <label for="tag"><input type="checkbox" name="selectedtags[]" value="{{$tag->id}}" id="tag">
                            {{$tag->tag}}</label>
                        @endforeach

                    </div>
                </div>

                <div class="form-group">

                    <label for="content">Content</label>
                    <div class="form-group">
                        <textarea  id="content" name="content" ></textarea>
                            <!-- <textarea   ></textarea> -->

                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn  -success" type="submit">ok</button>
                    </div>
                </div>

        </form>

    </div>

</div>
@stop


