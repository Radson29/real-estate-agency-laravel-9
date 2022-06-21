<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/img/logo.png') }}" class="logo" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
        <li class="nav-item {{ (request()->routeIs('index')) ? 'active' : '' }}  mr-3">
            <a class="nav-link text-warning " href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item mr-3 {{ (request()->routeIs('oferty')) ? 'active' : '' }}">
            <a class="nav-link text-warning" href="{{ route('oferty') }}">Nasza oferta</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
        @if (Auth::check())
          <li class="nav-item mr-3 {{ (request()->routeIs('kontakt.index')) ? 'active' : '' }}">
            <a class="nav-link text-warning" href="{{ route('kontakt.index') }}">
              <i class="fa fa-columns"></i> Panel użytkownika ({{ Auth::user()->get_full_name() }})</a>
          </li>
          <li class="nav-item mr-3">

          <a class="nav-link text-warning" href="{{ route('logout') }}" >
            <i class="fas fa-sign-in-alt"></i>  Wyloguj
          </a>
        
          @else
          <li class="nav-item mr-3 {{ (request()->routeIs('register')) ? 'active' : '' }}">
            <a class="nav-link text-warning" href="{{ route('register') }}">
              <i class="fas fa-user-plus"></i> Zarejestruj</a>
          </li>
          <li class="nav-item mr-3 ">
            <a class="nav-link text-warning" href="{{ route('login') }}">
              <i class="fas fa-sign-in-alt"></i>
           
            Zaloguj</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
