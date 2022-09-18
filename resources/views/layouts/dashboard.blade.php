<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ai Mails</title>
  <link rel="stylesheet" href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('node_modules/flag-icon-css/css/flag-icon.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img src="{{ asset('images/logo_star_black.png') }}" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
        </form>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">
            <a class="nav-link profile-pic" href="{{ route('dashboard') }}"><img class="rounded-circle" src="images/faces/face8.jpg" alt=""></a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          
          <div class="user-info">
            <img src="{{ asset('images/faces/face8.jpg') }}" alt="">
            <p class="name">Ms. Millenia Alfina</p>
            <p class="designation">{{Auth ::user()->name}}</p>
            <span class="online"></span>
          </div>

          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/icons/1.png') }}" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('surat_masuk') }}">
                <img src="{{ asset('images/icons/2.png') }}" alt="">
                <span class="menu-title">Surat Masuk</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('surat_keluar') }}">
                <img src="{{ asset('images/icons/2.png') }}" alt="">
                <span class="menu-title">Surat keluar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('form_surat') }}">
                <img src="{{ asset('images/icons/004-sheet.png') }}" alt="">
                <span class="menu-title">Buat Surat</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('form_tipe') }}">
                <img src="{{ asset('images/icons/006-letter.png') }}" alt="">
                <span class="menu-title">Entri Tipe</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#disposisi" aria-expanded="false" aria-controls="sample-pages">
                <img src="{{ asset('images/file-icons/64/004-folder-1.png') }}" alt="">
                <span class="menu-title">Disposisi</span>
              </a>

              <div class="collapse" id="disposisi" style="">
                <ul class="nav flex-column sub-menu">

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('disposisi_masuk') }}">Disposisi Masuk</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('disposisi_keluar') }}">Disposisi Keluar</a>
                  </li>

                </ul>
              </div>

            </li>
            @if(Auth::user()->level == "tatausaha")
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="true" aria-controls="sample-pages">
                <img src="{{ asset('images/icons/008-list.png') }}" alt="">
                <span class="menu-title">Entri Bagian</span>
              </a>

              <div class="collapse" id="laporan" style="">
                <ul class="nav-flex-column sub-menu">
                  
                  <!--<li class="nav-item">
                    <a class="nav-link" href="{{ route('form_tipe')}}"> Entri Tipe</a>
                  </li>-->

                  <li class="nav-item">
                    <a  class="nav-link" href="{{ route('form_user') }}">User Manajemen</a>
                  </li>

                </ul>
              </div>

            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ route('form_laporan') }}">
                <img src="{{ asset('images/icons/003-file.png')}}" alt="">
                <span class="menu-title">Laporan</span>
              </a>
            </li>
          </ul>
        </nav>
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="float-right">
            <a href="#">Star Admin</a> &copy; 2017
          </span>
        </div>
      </footer>
    </div>
  </div>

<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }} "></script>
<script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }} "></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }} "></script>
<script src="{{ asset('node_modules/chart.js/dist/Chart.min.js') }} "></script>
<script src="{{ asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }} "></script>

<script src="{{ asset('js/off-canvas.js') }} "></script>
<script src="{{ asset('js/hoverable-collapse.js') }} "></script>
<script src="{{ asset('js/misc.js') }} "></script>
<script src="{{ asset('js/chart.js') }} "></script>
<script src="{{ asset('js/maps.js') }} "></script>
</body>

</html>
