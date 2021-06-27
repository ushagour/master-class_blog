@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
@if(Session::has('info'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>

@endif
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
        <form action="{{route('profile.update',['id'=>1])}}" method="post"  enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  $user->email}}" required autocomplete="email">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> old password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="old-password"  autocomplete="password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password" class="col-md-4 col-form-label text-md-right">new Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control @error('password') is-invalid @enderror"
                                 name="newpassword"  autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-avatar" class="col-md-4 col-form-label text-md-right">Edit  Avatar</label>

                            <div class="col-md-6">
<input type="file" name="avatar"  class="form-control " id="new-avatar">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-Facebook" class="col-md-4 col-form-label text-md-right">Facebook</label>

                            <div class="col-md-6">
                                <input id="new-Facebook" type="text" class="form-control @error('Facebook') is-invalid @enderror" 
                                name="facebook"  autocomplete="new-Facebook" value="{{  $user->profile->facebook}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-Youtube" class="col-md-4 col-form-label text-md-right">Youtube</label>

                            <div class="col-md-6">
                                <input id="new-Youtube" type="text" class="form-control @error('Youtube') is-invalid @enderror" 
                                name="youtube"  autocomplete="new-Youtube" value="{{  $user->profile->youtube}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">About you</label>

                            <div class="col-md-6">

<textarea name="about" id="about" cols="40" rows="5" >{{  $user->about}} </textarea>
                            </div>
                        </div>

             <div class="form-group text-center">


             <button type="submit" class="btn btn-success">Update</button>

       

             </div>
        </form>

    </div>

</div>
@stop
