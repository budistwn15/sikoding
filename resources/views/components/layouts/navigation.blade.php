<div>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg @yield('background','navbar-light bg-white')">
        <div class="@yield('bungkus','container')">
          <a class="navbar-brand" href="{{ url('/') }}">
            @yield('img')
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="{{ route('login') }}">Log in</a>
                </li>
                @if (Route::has('register'))
                            <!-- desktop -->
                        <form class="ml-4 d-flex d-none d-md-block">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-navbar-right ms-2">Daftar Gratis</a>
                        </form>
                        <!-- mobile -->
                        <form class="d-grid gap-2 d-sm-block d-md-none">
                            <a href="{{ route('register') }}" class="btn btn-primary">Daftar Gratis</a>
                        </form>
                        @endif
                    @else
                    <li class="nav-item">
                        <a href="{{ route('front.course.all') }}" class="nav-link">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.certificate.index') }}" class="nav-link">Certificate</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('testimoni.index') }}" class="nav-link">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bantuan') }}" class="nav-link">Bantuan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @hasanyrole($roles)
                            <li><a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a></li>
                        @endhasanyrole
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endguest
            </ul>
          </div>
        </div>
      </nav>
</div>
