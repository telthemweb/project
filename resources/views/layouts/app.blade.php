<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Telthem Power</title>

    <!-- Styles -->
  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Telthem Power
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">


            
    <div class="row">
       @if(Auth::check())
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item active">
                    <a style="color:#fff;" href="{{route('home')}}" >Home <span class=" pull-right"><i class="fa fa-home"></i></span></a>
                </li>
                 <li class="list-group-item">
                    <a href="{{route('posts')}}" ><i class="fa fa-comment"></i> All Posts </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('post.create')}}" ><i class="fa fa-pencil"></i> Create new Post </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('posts.trashed')}}" ><i class="fa fa-trash"></i> All Trashed Posts </a>
                </li>

                 <li class="list-group-item">
                    <a href="{{route('category.create')}}" ><i class="fa fa-send"></i> Create new Category </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('categories')}}" ><i class="fa fa-briefcase"></i> Category </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('tag.create')}}" ><i class="fa fa-tag"></i> Create Tags </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('tags')}}" ><i class="fa fa-tag"></i> All Tags </a>
                </li>
                 @if(Auth::user()->admin)
                     <li class="list-group-item">
                    <a href="{{route('users')}}" ><i class="fa fa-user"></i> All Users </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('user.create')}}" ><i class="fa fa-user"></i> Create New User </a>
                </li>
                 @endif
                   <li class="list-group-item">
                    <a href="{{route('user.profile')}}" ><i class="fa fa-user"></i> My Profile </a>
                  </li>
                   @if(Auth::user()->admin)
                   <li class="list-group-item">
                    <a href="{{route('settings')}}" ><i class="fa fa-cog"></i> Settings</a>
                  </li>
                   @endif
            </ul>
        </div>
        @else
        <div class="col-lg-4">
            <div class="alert alert-danger" role="alert">
              This me Tauzeni
            </div>
        </div>
       @endif
        <div class="col-lg-8">
           @yield('content') 
        </div>
    </div>
</div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
     <script>
         @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
          @endif

           @if(Session::has('info'))
           toastr.info("{{ Session::get('info') }}");
          @endif
     </script>
</body>
</html>
