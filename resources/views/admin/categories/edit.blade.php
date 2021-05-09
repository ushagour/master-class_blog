@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        create new category
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
        <form action="{{route('category.update',['id'=>$category->id])}}" method="post">

            {{csrf_field()}}
            <div class="form-group">

                <label for="name">Name</label>

                <input type="text" class="form-control" name="name" value="{{$category->name}}" id="name">
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
