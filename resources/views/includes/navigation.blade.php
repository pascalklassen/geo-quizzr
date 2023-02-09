<nav class="navbar navbar-expand-md shadow-sm">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand"><i class="bi bi-globe-europe-africa text-success"></i> Geo Quizzr</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/play') }}" class="nav-link">Play!</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/about') }}" class="dropdown-item"><i class="bi bi-people-fill"></i> Team</a>
                        </li>
                        <li>
                            <a href="https://github.com" class="dropdown-item"><i class="bi bi-github"></i> GitHub</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="nav-link">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{--
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
--}}
