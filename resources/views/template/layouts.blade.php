<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <title>Ancol</title>
    <style>
        .fc-col-header-cell-cushion {
            color: white !important;
        }

        td {
            background-color: white !important;
        }
    </style>
</head>

<body style="background-color:#3A467E">
    <div class="header mt-3">
        <p class="text-center" style="color: #FFFFFF; font-size: 15px; font-weight: 400">Kec. Pademangan, Jakarta Utara,
            Daerah Khusus Ibukota Jakarta</p>
    </div>


    <nav class="navbar navbar-light" style="background-color: #BECEFF">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" style="" href="{{ url('/') }}">
                <img src="{{ url('assets/logo_ancol_putih.png') }}" alt="" width="222px" height="72px">
            </a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="background-color: #BECEFF">
                <div class="offcanvas-header">
                    <img src="{{ url('assets/logo_ancol_putih.png') }}" alt="" width="222px" height="72px">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>


                <div class="offcanvas-body">
                    @if (Auth::check())

                        @if (Auth::user()->role === 'admin')
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item justify-content-start">
                                    <a class="nav-link ml-2" style="" href="#">
                                        <img src="{{ url('assets/vector_profile.png') }}" alt=""
                                            width="44px" height="44px">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('user') }}"
                                        role="button"
                                        aria-expanded="false">
                                        User
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('rombongan') }}"
                                        id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Rombongan
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #BECEFF"
                                        aria-labelledby="offcanvasNavbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('rombongan') }}">Daftar Rombongan</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ url('rombongan/create') }}">Tambah
                                                Rombongan</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('venue') }}"
                                        id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Venue
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #BECEFF"
                                        aria-labelledby="offcanvasNavbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('venue') }}">Daftar Venue</a></li>
                                        <li><a class="dropdown-item" href="{{ url('venue/create') }}">Tambah Venue</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('venue') }}"
                                        id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Pemesanan
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #BECEFF"
                                        aria-labelledby="offcanvasNavbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('pemesanan') }}">Daftar Pemesanan</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ url('pemesanan/create') }}">Tambah
                                                Pemesanan</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link ml-2" href="/logout" style="color: #3A467E">
                                        <img src="{{ url('assets/logout.png') }}" alt="" width="44px"
                                            height="44px">
                                    </a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item justify-content-start">
                                    <a class="nav-link ml-2" style="" href="#">
                                        <img src="{{ url('assets/vector_profile.png') }}" alt=""
                                            width="44px" height="44px">
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('rombongan') }}"
                                        id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Rombongan
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #BECEFF"
                                        aria-labelledby="offcanvasNavbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('rombongan') }}">Daftar
                                                Rombongan</a></li>
                                        <li><a class="dropdown-item" href="{{ url('rombongan/create') }}">Tambah
                                                Rombongan</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('venue') }}"
                                        id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Venue
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #BECEFF"
                                        aria-labelledby="offcanvasNavbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('venue') }}">Daftar Venue</a></li>
                                        <li><a class="dropdown-item" href="{{ url('venue/create') }}">Tambah
                                                Venue</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('venue') }}"
                                        id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Pemesanan
                                    </a>
                                    <ul class="dropdown-menu" style="background-color: #BECEFF"
                                        aria-labelledby="offcanvasNavbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('pemesanan') }}">Daftar
                                                Pemesanan</a></li>
                                        <li><a class="dropdown-item" href="{{ url('pemesanan/create') }}">Tambah
                                                Pemesanan</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link ml-2" href="/logout" style="color: #3A467E">
                                        <img src="{{ url('assets/logout.png') }}" alt="" width="44px"
                                            height="44px">
                                    </a>
                                </li>
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        {{-- @include('template.message') --}}
        @include('sweetalert::alert')
        @yield('content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
