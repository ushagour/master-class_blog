@extends('layouts.dashboard')
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
@endif.
        <form action="{{route('setting.update',['id'=>1])}}" method="post"  enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="form-group row">
                            <label for="site_name" class="col-md-4 col-form-label text-md-right">{{ __('site_name') }}</label>

                            <div class="col-md-6">
                                <input id="site_name" type="text" class="form-control @error('site_name') is-invalid @enderror" name="site_name" value="{{ $setting->site_name}}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_number" class="col-md-4 col-form-label text-md-right">{{ __('contact_number') }}</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{  $setting->contact_number}}" required >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_email" class="col-md-4 col-form-label text-md-right">contact_email</label>

                            <div class="col-md-6">
                                <input id="contact_email" type="text" class="form-control @error('contact_email') is-invalid @enderror" 
                                name="contact_email"  autocomplete="contact_email" value="{{ $setting->contact_email}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                                name="address"  autocomplete="address" value="{{  $setting->address}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adresse2" class="col-md-4 col-form-label text-md-right">adresse2</label>

                            <div class="col-md-6">
                                <input id="adresse2" type="text" class="form-control @error('adresse2') is-invalid @enderror" 
                                name="adresse2"  autocomplete="adresse2" value="{{  $setting->adresse2}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" 
                                name="country"  autocomplete="country" value="{{  $setting->country}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="City" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input id="City" type="text" class="form-control @error('City') is-invalid @enderror" 
                                name="City"  autocomplete="City" value="{{  $setting->City}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">about</label>

                            <div class="col-md-6">

                                <textarea name="about" id="about" cols="30" rows="10"> {{  $setting->about}}</textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jourheureOfappel" class="col-md-4 col-form-label text-md-right">jourheureOfappel</label>

                            <div class="col-md-6">
                                <input id="jourheureOfappel" type="text" class="form-control @error('jourheureOfappel') is-invalid @enderror" 
                                name="jourheureOfappel"  autocomplete="jourheureOfappel" value="{{  $setting->jourheureOfappel}}">

                            </div>
                        </div>

     

             <div class="form-group text-center">


             <button type="submit" class="btn btn-success">Update</button>

       

             </div>
        </form>

    </div>

</div>
@stop
