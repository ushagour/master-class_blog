@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-header">

<h3>Categories !</h3>

  </div>
  <div class="card-body">
  <table class="table">

    <tbody>
    @if($categories->count()>0)

    @foreach($categories as $category)
        <tr>
            <td> {{$category->name}}</td>   
            <td> <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-xs btn-info">edit</a> </td>   
            <td> <a href="{{route('category.destroy',['id'=>$category->id])}}" class="btn btn-xs btn-danger">delete</a></td>   
        </tr>
     @endforeach

@else

<tr>
    <td class="text-center" colspan="5"> no category yet !</td>
</tr>
@endif

    </tbody>
</table>  </div>
</div>


@stop
