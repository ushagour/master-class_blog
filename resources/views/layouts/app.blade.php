<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>  
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" ></script>  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        
        
        @yield('style')

 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
<div class="container">
    <div class="row">



    <!-- menu de navigation -->
    @if(Auth::check())
        <div class="col-lg-4">
        <ul class="liste-group">
            <li class="list-group-item">
          <a href="{{route('home')}}">home</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('post.index')}}">ALL Posts</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('post.trashed')}}">ALL Trashed Posts</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('post.create')}}">crete new post</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('category.index')}}">categories</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('category.create')}}">crete new category</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('tag.index')}}">Tags</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('tag.create')}}">crete new tags</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('profile.index')}}">Profile</a>
            
            </li>

@if(Auth::user()->is_admin)

            <li class="list-group-item">
          <a href="{{route('users.index')}}">Users</a>
            
            </li>
            <li class="list-group-item">
          <a href="{{route('user.create')}}">crete new user</a>
            
            </li>

@endif

        </ul>
        
        </div>
        @endif
    <!-- end of  menu de navigation -->
    <!-- content of page-->

        <div class="col">
        
        @yield('content')
        
        </div>
    <!-- end of content -->

    </div>
</div>


        </main>
    </div>


        @yield('scrypts')

</body>
</html>
