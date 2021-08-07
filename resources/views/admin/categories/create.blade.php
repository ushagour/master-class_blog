@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-header">
Create New Category

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

        <form action="{{route('category.store')}}" method="post">

            {{csrf_field()}}
            <div class="form-group">

                <label for="name">Name</label>

                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">ok</button>
                </div>
            </div>

        </form>
    </div>
</div>



</div>

</div>
@stop
