<!-- header section strats -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="index.html">
                <span>
                    FORMINA
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home.index') }}">Beranda <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.katalog') }}"> Katalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}"> Keranjang </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">Hubungi Kami</a>
                        </li>
                    </ul>
                </div>
                <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                    @if (Route::has('login'))
                        @auth
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout
                                            </a>
                                        </form>
                                    </li>
                                </ul>


                            </div>
                        @else
                            <a href="{{ route('login') }}">
                                LOGIN
                            </a>
                        @endauth
                    @else
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
