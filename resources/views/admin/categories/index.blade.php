@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-body">
  <table class="table">
    <thead>
        <tr>
       category
        </tr>
    
    </thead>
    <tbody>

    @foreach($categories as $category)
        <tr>
            <td> {{$category->name}}</td>   
            <td> <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-xs btn-info">edit</a> </td>   
            <td> <a href="{{route('category.destroy',['id'=>$category->id])}}" class="btn btn-xs btn-danger">delete</a></td>   
        </tr>
     @endforeach
    </tbody>
</table>  </div>
</div>


@stop
