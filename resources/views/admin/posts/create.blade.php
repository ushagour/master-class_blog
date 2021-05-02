@extends('layouts.app')
@section('content')

<div class="panel panel-defult">
    <div class="panel-heading">
        create new post
    </div>
    <div class="panel-body">

        <form action="/post/store" method="post" class="">

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

                <label for="featured">Content</label>
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
