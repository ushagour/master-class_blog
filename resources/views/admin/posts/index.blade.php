@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-header">

<h3>All  posts !</h3>

  </div>
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
@if($posts->count()>0)
    @foreach($posts as $post)
        <tr>
            <td>     <img src="{{asset('/'. $post->featured)}}" width="50px" height="50px" /> </td>   
            <td> {{$post->title}}</td>   
            <td> <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-xs btn-info">edit</a>  <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-xs btn-danger">delete</a></td>   

        </tr>
     @endforeach

@else
<tr>

<td colspan="5" class="text-center"> no post yet!</td>
</tr>

@endif
    </tbody>
</table>
  </div>
</div>


@stop
