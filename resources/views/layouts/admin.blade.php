<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">
  <!-- Shop Sidebar -->
  @include('layouts.admininc.sidebar')
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.admininc.navbar')
    
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <!-- Shop overview calculation section -->
      @include('layouts.admininc.shopcalc')
      
      <!-- Custom content section -->
      @yield('content')
      
      <!-- Charts section -->
      {{-- @include('layouts.admininc.shopchart') --}}
      
      <!-- Projects section -->
      @include('layouts.admininc.project')
      
      <!-- Footer section -->
      @include('layouts.admininc.footer')

    </div>

  </main>
  <!-- Settings section -->
  @include('layouts.admininc.setting')
  
  <!-- All section are End -->

    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}" defer></script>

    
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin/js/material-dashboard.min.js') }}" defer></script>
  
  
  @yield('script')

</body>
</html>
