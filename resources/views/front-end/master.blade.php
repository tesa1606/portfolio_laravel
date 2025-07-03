<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/front-end/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front-end/css/font-awesome.min.css') }}" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/front-end/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front-end/css/responsive.css') }}" />
</head>

<body>
  <div class="hero_area">
    <!-- Header Section -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <div class="custom_menu-btn">
          <button onclick="openNav()">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>
        </div>
        <div id="myNav" class="overlay">
          <div class="menu_btn-style ">
            <button onclick="closeNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
          </div>
          <div class="overlay-content">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/portfolio') }}">Portfolio</a>
            <a href="{{ url('/team') }}">Team</a>
          </div>
        </div>
        <a class="navbar-brand" href="{{ url('/') }}">
          <span>Lens of Arselio</span>
        </a>
        <a href="#" class="call_btn">Call Us Now</a>
      </nav>
    </header>
    <!-- End Header -->

    <!-- Page Content -->
    @yield('konten')
    <!-- End Page Content -->

  </div>

  <!-- Footer -->
  <footer class="footer_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6">
          <p></p>
        </div>
        <div class="col-xl-6">
          <div class="link_box">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/portfolio') }}">Portfolio</a>
            <a href="{{ url('/team') }}">Team</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <script src="{{ asset('assets/front-end/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('assets/front-end/js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ asset('assets/front-end/js/custom.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>

  <!-- Masonry.js CDN -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</body>
</html>