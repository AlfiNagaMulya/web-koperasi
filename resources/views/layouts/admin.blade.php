<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>
    @stack('addon-style')
  </head>

  <body>
    <div class="dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading ">
            <img src="/images/icon_admin.png" width="110px" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : ''}}">Produk </a>
            <a href="{{ route('product-gallery.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : ''}}">Gallery produk</a>
            <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : ''}}">Kategori produk</a>
            <a href="{{ route('transaction.index') }}" class="list-group-item list-group-item-action {{  (request()->is('admin/transaction*')) ? 'active' : '' }}">Transaksi Penjualan</a>
            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : ''}}">Users</a>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">&laquo; Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto d-none d-lg-flex">
                <li class="nav-item dropdown mr-4 ">
                  <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/images/profile-result.png" width="40px" alt="" class="rounded-circle mr-2 profile-picture" />
                    Hi,  <strong> {{  Auth::user()->name }} </strong>
                  </a>
                  <div class="dropdown-menu ">
                    <a href="{{ route('home') }}" class="dropdown-item">Back To Home </a>
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
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Hi, <strong> Alfi</strong> </a>
                </li>
              </ul>
            </div>
          </nav>

          {{-- Content --}}
          @yield('content')



      </div>
    </div>

    <!-- Script -->
    @stack('prepend-script')

    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
   <script>
      AOS.init();
    </script>



<script>
    // <block:setup:1>
const data =  {
    labels: [
              'Makanan',
              'Minuman',
              'Bahan Pokok',
              'Kebutuhan Rumah',
             
          ],
    datasets: [{
        label: 'Interests',
        data:[
                                  3,
                                  1,
                                  1,
                                  1,
                                  0,
                                  0,
                                  0,
                  ],
        fill: true,
        backgroundColor: 'rgba(36, 71, 249, 0.2)',
        borderColor: '#FF7158',
        pointBackgroundColor: '#fff',
        pointBorderColor: '#2447F9',
        pointHoverBackgroundColor: '#2447F9',
        pointHoverBorderColor: '#fff',
        pointBorderWidth: 3,
        pointRadius: 4,
        tension: 0.2,
    }]
};

// </block:setup>
  </script>
<script>
  // === include 'setup' then 'config' above ===

  var myChart = new Chart(
    document.getElementById('myChart'),
    {
    type: 'radar',
    data: data,
    options: {
        plugins: {
            legend: {
                display: false,
            }
        }
    },
}
  );

  
</script>

 
    <!-- Menu Toggle Script -->
    <script>
      $('#menu-toggle').click(function (e) {
        e.preventDefault();
        $('#wrapper').toggleClass('toggled');
      });
    </script>
    @stack('addon-script')

  </body>
</html>
