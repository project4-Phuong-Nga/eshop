<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('category') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('cart') }}">Cart</a>
        </li>

        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">

          <a class="nav-link" href="{{ route('register') }}">{{ __('Register')}}</a>
        </li>

        @endif
        @else
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" role="button" id="navbarDropdown">
            {{ Auth::user() -> name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li>
              <a href="#" class="dropdown-item">
                My Orders
              </a>
            </li>
            <li>
              <a href="#" class="dropdown-item">
                My Profile
              </a>
            </li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault()" class="dropdown-item">
                {{ __('Logout') }}
              </a>
              <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        @endguest

        
      </ul>
    </div>
  </div>
</nav>