

{{-- Navbar --}}
<nav class="navbar navbar-koperasi navbar-expand-lg navbar-light bg-light" data-aos="fade-down" data-aos-duration="1500">
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand" > <img src="/images/Logo Koperasi.svg" alt="Logo"  width="80px"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="{{ route('home') }}" class="nav-link" aria-current="page" >Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories') }}" class="nav-link" >Kategori </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Company Profile</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-success rounded-pill px-5 text-white" href="{{  route('login')  }}" tabindex="-1" aria-disabled="true">Masuk</a>
            </li>
            @endguest
          </ul>
          @auth
        <!-- Desktop Menu -->
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown">
              <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi,  <strong>  {{  Auth::user()->name }} </strong> 
                  </a>
                    <div class="dropdown-menu ">
                        <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard </a>
                        <a href="{{ route('dashboard-settings') }}" class="dropdown-item">
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                   </div>
            </li>
            <li class="nav-item">
           <a href="{{ route('cart') }}" class="nav-link d-inline-block ">
                        @php
                            $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp
                        @if($carts > 0)
                            <img src="/images/icon_cart.svg" alt="" />
                            <div class="card-badge  ">{{ $carts }}</div>
                        @else
                            <img src="/images/icon-cart-filled.svg" alt="" />
                        @endif
                    </a>
            </li>
          </ul>   
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">
                H, {{  Auth::user()->name}}
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                Cart
              </a>
            </li>
          </ul>
          @endauth
        </div>
      </div>
    </nav>



        