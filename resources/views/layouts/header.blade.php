<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky">   
        @if (isset(Auth::user()->Administrator) and Auth::user()->Administrator == '1')
            <a class="navbar-brand" href="/adminpanel">
                <img src="/images/logo.png" width="110" height="40" alt="">
            </a>        
        @else
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" width="110" height="30" alt="">
            </a>      
        @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="mx-4 nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Home
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Galerija</a>
                <a class="dropdown-item" href="#">O Nama</a>
                <a class="dropdown-item" href="#">Kontakt</a>
            </div>
        </li>

        <li class="mx-4 nav-item">
                <a class="nav-link" href="/prodavnica/korpa">Korpa</a>
        </li>
        


        @guest
            <li class="ml-4 nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            {{-- <a class="link m-2" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
        @else
            <li class="ml-4 nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/korisnik/promenaPodataka">Promena Podataka</a>
                <a class="dropdown-item" href="/korisnik/promenaLozinke">Promena Lozinke</a>
                <a class="dropdown-item" href="/korisnik/verifikovanje">Verifikovanje</a>

                @if ( Auth::user()->Administrator == '0')
                    <a class="dropdown-item" href="/korisnik/narudzbine">Narudzbine</a>
                @endif
                </div>
            </li>

            <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
                <form class="link m-2 mr-5" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>

        @endguest
      </ul>
    </div>
    <form class="form-inline" method="post" action="/prodavnica/pretraga">
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="s">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>