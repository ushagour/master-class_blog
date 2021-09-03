@extends('layouts.dashboard')
@section('content')
<div class="card">
<div class="card-header">

<h3>Tags !</h3>
  

  </div>
  <div class="card-body">
  <table class="table">

    <tbody>
    @if($tags->count()>0)

    @foreach($tags as $tag)
        <tr>
            <td>    {{$tag->tag}}</td>   
            <td> <a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a> </td>   
            <td> <a href="{{route('tag.destroy',['id'=>$tag->id])}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a></td>   
        </tr>
     @endforeach

@else

<tr>
    <td class="text-center" colspan="5"> no tags yet !</td>
</tr>
@endif

    </tbody>
</table>  </div>
</div>


@stop
