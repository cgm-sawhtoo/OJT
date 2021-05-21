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
                <a class="navbar-brand" href="{{ route('index') }}">Bulletin_Board</a>
            </div>
            <ul class="mr_auto navbar-nav navbar-right">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('register')}}">Sigup</a>
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
</body>

</html>
