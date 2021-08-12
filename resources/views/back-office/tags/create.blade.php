@extends('layouts.dashboard')
@section('content')

<div class="card">
    <div class="card-header">
    <h2>        Create New Tag </h2>
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

@if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif
        <form action="{{route('tag.store')}}" method="post" enctype="multipart/form-data">

            {{csrf_field()}}

            <div class="form-group col-md-4 offset-md-4"> 

                <label for="tag">Tag</label>

                <input type="text" class="form-control" name="tag" placeholder="#" id="tag">
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
