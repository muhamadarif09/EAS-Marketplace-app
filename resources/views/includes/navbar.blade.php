<nav
  class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
  data-aos="fade-down"
>
  <div class="container">
    
      <h2 class="text-success">Oblong's</h2>
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarResponsive"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link text-success">Home</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categories') }}" class="nav-link text-success">Produk</a>
        </li>
        @guest
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link text-success">Daftar</a>
          </li>
          <li class="nav-item">
            <a
              href="{{ route('login') }}"
              class="btn btn-success nav-link px-4 text-white"
              >Login</a
            >
          </li>
        @endguest
      </ul>

      @auth
        <!-- Desktop Menu -->
        <ul class="navbar-nav d-none d-lg-flex">
          <li class="nav-item dropdown">
            <a
              href="#"
              class="nav-link"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
            >
              <img
                src="/images/Sample_User_Icon.png"
                alt=""
                class="rounded-circle mr-2 profile-picture"
                style="color: green"
              />
               {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
              <a href="{{ route('dashboard') }}" class="dropdown-item text-success">Dashboard</a>
              <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item text-success"
                >Settings</a
              >
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item text-success">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-inline-block mt-2">
                @php
                    $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                @endphp

                @if ($carts > 0)
                    <a href="/cart">
                    <img src="/images/WhatsApp Image 2021-06-21 at 16.37.33.jpeg" alt="" />
                    </a>
                    <div class="card-badge">{{ $carts }}</div>
                @else
                    <a href="/cart">
                    <img src="/images/WhatsApp Image 2021-06-21 at 16.37.33.jpeg" alt="" />
                    </a>
                @endif
            </a>
          </li>
        </ul>

        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a href="#" class="nav-link">
               {{ Auth::user()->name }}
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-inline-block">
              Cart
            </a>
          </li>
        </ul>
      @endauth
    </div>
  </div>
</nav>
