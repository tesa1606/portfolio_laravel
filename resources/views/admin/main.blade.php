<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lens Of Arselio</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/template/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('assets/template/dist/css/adminlte.min.css') }}">

  <!-- Plugins -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('assets/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('assets/template/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Lens Of Arselio</span>
    </a>

    <!-- Sidebar Content -->
    <div class="sidebar">
      <!-- User Panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Tesa Sulistia</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- About -->
          <li class="nav-item">
            <a href="/admin/about" class="nav-link {{ request()->is('admin/about') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>About</p>
            </a>
          </li>

          <!-- Contact -->
          <li class="nav-item">
            <a href="{{ route('contacts.index') }}" class="nav-link {{ request()->is('admin/contact') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Contact</p>
            </a>
          </li>

          <!-- Testimonial -->
          <li class="nav-item">
            <a href="/admin/testimonials" class="nav-link {{ request()->is('admin/testimonials') ? 'active' : '' }}">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>Testimonial</p>
            </a>
          </li>

          <!-- Portfolio -->
          <li class="nav-item">
            <a href="/admin/portfolio" class="nav-link {{ request()->is('admin/portfolio') ? 'active' : '' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>Portfolio</p>
            </a>
          </li>

          <!-- Team -->
          <li class="nav-item">
            <a href="/admin/team" class="nav-link {{ request()->is('admin/team') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Team</p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Page Title -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">@yield('judul')</h1>
      </div>
    </div>

    <!-- Main Content -->
    <div class="content">
      <div class="container-fluid">
        @yield('konten')
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">Anything you want</div>
    <strong>&copy; 2014-2025 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

</div>

<!-- JS Scripts -->
<script src="{{ asset('assets/template/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('assets/template/dist/js/adminlte.min.js') }}"></script>
@yield('scripts')

<!-- Additional Plugins -->
<script src="{{ asset('assets/template/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/template/plugins/sparklines/sparkline.js') }}"></script>

<!-- Masonry.js -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

</body>
</html>
