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
            <td>  <a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-xs btn-success">restore</a>  <a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-xs btn-danger"> force delete</a></td>   

        </tr>
     @endforeach
    </tbody>
</table>
  </div>
</div>


@stop