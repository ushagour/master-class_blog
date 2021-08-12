@extends('layouts.dashboard')
@section('content')
<div class="card">
<div class="card-header">

<h3> Users managment ! </h3>
  
@if(Session::has('info'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>

@endif
  </div>
  <div class="card-body">
  <table class="table">

<thead>

<tr>
 <th>avatar </th>
 <th>name  </th>
 <th>permetions  </th>
 <th>action  </th>
 
 </tr>
</thead>
    <tbody>
    @if($users->count()>0)

    @foreach($users as $user)
        <tr>
            <td>  <img src="{{asset('/'. $user->profile['avatar'])}}" width="50px" height="50px"  alt="{{$user->name}}"/> </td>   
            <td>{{$user->name}}  </td>   
            <td> 
        
        @if(!$user->is_admin)
    <a href="{{route('users.toggle',['id'=>$user->id,'state'=>$user->is_admin])}}" class="btn btn-sm btn-success">make it admin </a>     
    @else
        <a href="{{route('users.toggle',['id'=>$user->id,'state'=>$user->is_admin])}}" class="btn btn-sm btn-danger"> remove permetion </a>    
        @endif




          </td>   
            <td> 
            
            @if(Auth::id() !== $user->id )
            <a href="{{route('user.destroy',['id'=>$user->id])}}" class="btn btn-xs btn-danger">delete</a>
            @endif
            
            </td>   
      
      
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
