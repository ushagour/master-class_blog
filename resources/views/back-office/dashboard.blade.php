@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

<div class="row">
    
<div class="col-lg-3">   
  <div class="card text-white bg-primary mb-3">
        <div class="card-header">Posts</div>
        <div class="card-body">
            <h5 class="card-title">{{$count_posts}}</h5>
        </div>
    </div>
    
    </div>
    <div class="col-lg-3"> 
    <div class="card text-white bg-danger mb-3">
        <div class="card-header">Trashed Posts</div>
        <div class="card-body">
            <h5 class="card-title">{{$count_trashed_posts}}</h5>
        </div>
    </div>
    </div>
    <div class="col-lg-3"> 
    <div class="card text-white bg-success mb-3">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <h5 class="card-title">{{$count_categories}}</h5>
        </div>
    </div>
    </div>
    
    <div class="col-lg-3"> 
    <div class="card text-white bg-secondary mb-3">
        <div class="card-header">Users</div>
        <div class="card-body">
            <h5 class="card-title">{{$count_users}}</h5>
        </div>
    </div>
    </div>


    </div>



</div>
@endsection
