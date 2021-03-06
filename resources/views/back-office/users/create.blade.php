@extends('layouts.dashboard')
@section('content')

<div class="card">
    <div class="card-header">
        <h2> Create New user </h2>
    </div>
    <div class="card-body">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

        @endif
        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="form-group">

                <label for="name">Name</label>

                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">

                <label for="username">UserName</label>

                <input type="text" class="form-control" name="username" id="username">
            </div>
 
            <div class="form-group">

                <label for="name">Email</label>

                <input type="text" class="form-control" name="email" id="email">
            </div>
 



            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">ok</button>
                </div>
            </div>

        </form>

    </div>

</div>
@stop
