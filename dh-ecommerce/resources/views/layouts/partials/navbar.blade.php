<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/home') }}">
        {{-- <img src="{{ asset('img/assets/logo.png') }}" alt=""> --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                {{-- @if(Auth::check())   --}}
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Productos</a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="/products">Todos los productos</a>
                          <a class="dropdown-item" href="/products/create">Agregar nuevo</a>
                        </div>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="/categories">Todos las categorias</a>
                          <a class="dropdown-item" href="/categories/create">Agregar nuevo</a>
                        </div>
                </li>
                {{-- @endif --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuarios</a>
                </li>
                @if(Auth::check() && Auth::user()->role === 7)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Backoffice
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">General</a>
                        <a class="dropdown-item" href="#">Usuarios</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Posts</a>
                    </div>
                </li>
                @endif
            </ul>
      <ul class="navbar-nav ml-auto">

          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  @if (Route::has('register'))
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                  @endif
              </li>
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
    </div>
  </div>
</nav>