@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-body">
  
@if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif
  <table class="table table-striped table-inverse ">
    <thead class="thead-inverse">
        <tr>
        <th>img</th>    <th>title</th>    <th>action</th>
        </tr>
    
    
    </thead>
    <tbody>

    @foreach($posts as $post)
        <tr>
            <td>     <img src="{{asset('/'. $post->featured)}}" width="50px" height="50px" /> </td>   
            <td> {{$post->title}}</td>   
            <td> <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-xs btn-info">edit</a>  <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-xs btn-danger">delete</a></td>   

        </tr>
     @endforeach
    </tbody>
</table>
  </div>
</div>


@stop
