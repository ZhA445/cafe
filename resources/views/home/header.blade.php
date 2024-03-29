<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{url('/redirect')}}">
            <img src="images/coffee-beans.png" class="navbar-brand-image img-fluid" alt="Barista Cafe Template">
            Barista
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Our Menu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Reviews</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_5">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('profile.show') }}" :active="request() - > routesIs('profile.show')"
                                class="nav-link active">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none">
                                @csrf

                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                                class="nav-link font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}"
                                    class="nav-link font-semibold text-gray-600 hover:text-gray-900">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>

            <div class="ms-lg-3">
                <a class="btn custom-btn custom-border-btn" href="{{url('/reservation')}}">
                    Reservation
                    <i class="bi-arrow-up-right ms-2"></i>
                </a>
            </div>

        </div>
    </div>
</nav>

