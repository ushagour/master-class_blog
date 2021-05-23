@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
      modify  tag :  # {{$tag->tag}}
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
        <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">

            {{csrf_field()}}
            <div class="form-group">

                <label for="name">Tag </label>

                <input type="text" class="form-control" name="name" value="{{$tag->tag}}" id="name">
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
