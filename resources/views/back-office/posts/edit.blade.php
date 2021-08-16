@extends('layouts.dashboard')
@section('content')

<div class="card">
    <div class="card-header">
        <h2> update post : {{$post->title}}
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

                    <option value="{{$category->id}}" {{ ($category->id) == $post->category->id ? 'selected' : '' }}>  <!-- hena kanchoofo wach id dyal category == id dyal category li belongs to post dyalna -->
                        {{$category->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">


                <label for="tags">select Tags</label>



                <div class="row">
<div class="col">
                         @foreach($tags as $tag) <!-- had loop1 bach naffichiw ga3 les tags li kaynin   -->
                 




    <label for="tag">
    <!--  had loop 2 bach  nchoofo les tag li f table pivo  -->
    <!--   had if blow wach id dyal tag li f table pivo === id li f table tags -->
    
    
    
                            <input type="checkbox" name="selectedtags[]" value="{{$tag->id}}" id="tag"
                             @foreach($post->tags as $t) 
    
                                       @if($tag->id == $t->id) 
                                                                   checked
                                       @endif
                            @endforeach
    
                            > {{$tag->tag}}</label>

                            @endforeach
                        </div>
                        &nbsp;

</div>
            </div>
            <div class="form-group">

                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10"
                    class="form-control"> {{$post->content}}</textarea>
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
