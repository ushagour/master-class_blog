@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">

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
        <form action="{{route('profile.update',['id'=>1])}}" method="post">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="old-password" required autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password" class="col-md-4 col-form-label text-md-right">new Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control @error('password') is-invalid @enderror"
                                 name="password" required autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-avatar" class="col-md-4 col-form-label text-md-right">Edit  Avatar</label>

                            <div class="col-md-6">
<input type="file" name="avtar"  class="form-control " id="new-avatar">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-Facebook" class="col-md-4 col-form-label text-md-right">Facebook</label>

                            <div class="col-md-6">
                                <input id="new-Facebook" type="text" class="form-control @error('Facebook') is-invalid @enderror" 
                                name="Facebook" required autocomplete="new-Facebook" value="{{  $user->profile->facebook}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-Youtube" class="col-md-4 col-form-label text-md-right">Youtube</label>

                            <div class="col-md-6">
                                <input id="new-Youtube" type="text" class="form-control @error('Youtube') is-invalid @enderror" 
                                name="Youtube" required autocomplete="new-Youtube" value="{{  $user->profile->youtube}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">About you</label>

                            <div class="col-md-6">

<textarea name="about" id="about" cols="6" rows="3">{{  $user->about}} </textarea>
                            </div>
                        </div>

         
        </form>

    </div>

</div>
@stop
