@guest
    <a class="link m-2" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
        <a class="link m-2" href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
@else

    <a class="link m-2 mr-5" href="{{ route('logout') }}"
        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form class="link m-2 mr-5" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


    <div class="dropdown link m-2">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            {{ Auth::user()->name }} <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/korisnik/promenaPodataka">Promena Podataka</a>
          <a class="dropdown-item" href="/korisnik/promenaLozinke">Promena Lozinke</a>
          <a class="dropdown-item" href="/korisnik/verifikovanje">Verifikovanje</a>

          @if ( Auth::user()->Administrator == '0')
          <a class="dropdown-item" href="/korisnik/narudzbine">Narudzbine</a>
          @endif
        </div>
    </div>

    
@endguest


