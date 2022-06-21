<header class="topbar" data-navbarbg="skin6 ">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header bg-dark" data-logobg="skin5">

            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>

            <div class="navbar-brand">
                <a href="#" class="logo">

                    <b class="logo-icon">

                        <img src="{{ asset('assets/img/logo.png') }}" alt="homepage" class="ml-5 pl-4" />

                    </b>

                    <span class="logo-text ml-5" style="color: #ddd;">


                    </span>
                </a>
            </div>

            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">

            <ul class="navbar-nav float-left mr-auto">


            </ul>

            <ul class="navbar-nav float-right">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nazwa_uzytkownika }}</a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="ti-email m-r-5 m-l-5"></i> Wyloguj</a>

                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>