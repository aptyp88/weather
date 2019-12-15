@if(request()->path() != '/')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item" id="weather">
                    <a class="nav-link" href="{{ url('weather') }}">Weather</a>
                </li>
                <li class="nav-item" id="contact-us">
                    <a class="nav-link" href="{{ url('contact-us') }}">Contact us</a>
                </li>
                <li class="nav-item" id="comments">
                    <a class="nav-link" href="#">Comments</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hi, {{ ucfirst(auth()->user()->first_name) . ' ' . ucfirst(auth()->user()->last_name )}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

@endif