<nav class="navbar navbar-light">
    <!-- Navbar content -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laratter') }}
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

                            <notifications :user="{{ Auth::user()->id }}"></notifications>
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
