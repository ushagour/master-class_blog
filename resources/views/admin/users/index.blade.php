@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-header">

<h3> Users managment ! </h3>

  </div>
  <div class="card-body">
  <table class="table">

<thead>

<th>
 <td>avatar </td>
 <td>name  </td>
 <td>permetions  </td>
 <td>action  </td>
 
 </th>
</thead>
    <tbody>
    @if($users->count()>0)

    @foreach($users as $user)
        <tr>
            <td> <img src="assets({{$user->avatar}} )" alt="{{$user->name}}"> </td>   
            <td>{{$user->name}}  </td>   
            <td> permitions  </td>   
            <td> <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-xs btn-info">edit</a> <a href="{{route('user.destroy',['id'=>$user->id])}}" class="btn btn-xs btn-danger">delete</a></td>   
        </tr>
     @endforeach

@else

<tr>
    <td class="text-center" colspan="5"> no users yet !</td>
</tr>
@endif

    </tbody>
</table>  </div>
</div>


@stop
