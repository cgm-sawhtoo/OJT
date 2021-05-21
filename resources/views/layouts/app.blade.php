<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bulletin_Board- @yield("title")</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand">Bulletin_Board</span>
            </div>
            <ul class="mr_auto navbar-nav navbar-right">

                @section('user_sidebar')
                    <li>
                        {!! Form::open(['method' => 'GET', 'route' => 'user#search', 'class' => 'form-inline']) !!}
                        @csrf
                        <input class="form-control mr-sm-2" name="search-input" type="search" placeholder="Search">
                        <button class="btn btn-primary" type="submit" id="active">Search</button>
                        {!! Form::close() !!}
                    </li>
                @show

                @section('news_sidebar')
                    <li>
                        {!! Form::open(['method' => 'GET', 'route' => 'news#search', 'class' => 'form-inline']) !!}
                        @csrf
                        <input class="form-control mr-sm-2" name="search-input" type="search" placeholder="Search">
                        <button class="btn btn-primary" type="submit" id="active">Search</button>
                        {!! Form::close() !!}
                    </li>
                @show

                @if (auth()->user()->is_admin == 'true')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Menu
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('user#edit', auth()->user()->id) }}">Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('all#users') }}">All Users</a>
                            <a class="dropdown-item" href="{{ route('news#list') }}">All News</a>
                            <a class="dropdown-item" href="{{ route('news#add') }}">Add News</a>
                            <a class="dropdown-item" href="{{ route('change#password') }}">Change Password</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Menu
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('user#edit', auth()->user()->id) }}">Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('newslist#user') }}">All News</a>
                            <a class="dropdown-item" href="{{ route('news#add') }}">Add News</a>
                            <a class="dropdown-item" href="{{ route('change#password') }}">Change Password</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                @endif

                <li class="nav-item ">
                    <a class="nav-link"
                        href="{{ route('user#details', auth()->user()->id) }}">{{ auth()->user()->name }}</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="section">
        @yield('contents')
    </div>
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    @stack('tinyarea')
</body>
</html>
