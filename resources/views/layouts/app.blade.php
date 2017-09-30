<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
</head>
<body>

<div id="app" class="container">




    <div class="col-md-12">

        <div class="content">
            <nav class="navbar navbar-light static-top navbar-toggleable-md bg-faded">

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


                <!-- Branding Image -->

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
                        &nbsp;
                        <li class="nav-item">
                            <form action="/messages">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="query" placeholder="Buscar..."
                                           required/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-outline-success">
                                            Buscar
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto mt-2 mt-md-0">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            @else

                                <li class="nav-item dropdown mr-2">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        Notifications
                                        <span class="caret">
                                </span>

                                        <notifications :user = "{{ Auth::user()->id }}"></notifications>
                                    </a>

                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                </li>
                                @endguest
                    </ul>
                </div>
            </nav>
        </div>

        <div class="content">
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>

</div>



<!-- Scripts -->

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
