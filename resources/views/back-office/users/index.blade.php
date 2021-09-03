@extends('layouts.dashboard')
@section('content')
<div class="card">
<div class="card-header">

<h3> Users managment ! </h3>
  
@if(Session::has('info'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>

@endif
<div id="notice"></div>
  </div>
  <div id="CB" class="card-body">
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
            <button class="delete btn btn-xs btn-danger"  id="{{$user->id}}" type="button"><i class="fas fa-trash"></i></button>
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


<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
           
             <button type="button" onclick="deleteMe()" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('scrypts')
<script>
var user_id='';
$(document).on('click', '.delete', function(){
  $('#confirmModal').modal('show');
  user_id = $(this).attr('id');

//   console.log(user_id);
 });
function deleteMe(){
  $.ajax({
   url:"{{url('admin/user/delete')}}/" + user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
       console.log(data);
    setTimeout(function(){
     $('#confirmModal').modal('hide'); 
     $("#CB").load(document.URL+" #CB");
     $("#notice")
   .show()
   .html('<div class="alert alert-warning"<strong>Successfully !</strong> record deleted.</div>')
   .fadeOut(5000);  
  }, 2000);
   }
  })
 }



</script>
@endsection