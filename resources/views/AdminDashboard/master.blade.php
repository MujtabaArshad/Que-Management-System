      <!DOCTYPE html>

      <html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
          data-assets-path="../assets/" data-template="vertical-menu-template-free">

      <head>
          <meta charset="utf-8" />
          <meta name="viewport"
              content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
          <meta name="csrf-token" content="{{ csrf_token() }}">

          <title>@yield('title', 'Dashboard')</title>

          <meta name="description" content="" />

          <!-- Favicon -->
          <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

          <!-- Fonts -->
          <link rel="preconnect" href="https://fonts.googleapis.com" />
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
          <link
              href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
              rel="stylesheet" />

          <!-- Icons. Uncomment required icon fonts -->
          <link rel="stylesheet" href="{{ asset('/assets/js/config.js') }}" />

          <!-- Icons. Uncomment required icon fonts -->
          <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

          <!-- Core CSS -->
          <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}"
              class="template-customizer-core-css" />
          <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}"
              class="template-customizer-theme-css" />
          <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}" />

          <!-- Vendors CSS -->
          <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

          <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

          <!-- Page CSS -->

          <!-- Helpers -->
          <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>

          <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
          <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
          <script src="{{ asset('/assets/js/config.js') }}"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

      </head>
      <style>
          .menu-link i {
              font-size: 1.2em;

          }

          #img {
              width: 26%;
              margin-left: 7%;
          }
      </style>



<body>
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                  <!-- Menu -->
                  @include('AdminDashboard.sidebar')
                  <!-- /Menu -->

                  <!-- Layout page -->
                  <div class="layout-page bg-image-cover    ">
                        <!-- Navbar -->
                        @include('AdminDashboard.header')
                        <!-- /Navbar -->

                        <!-- Content wrapper -->
                        <div class="content-wrapper" style="min-height: 90vh;">
                              <!-- Content -->
                              @yield('content')
                              <!-- /Content -->

                              <!-- Footer -->
                              @include('AdminDashboard.footer')

                              <!-- /Footer -->

                              <div class="content-backdrop fade"></div>
                        </div>
                        <!-- /Content wrapper -->

                  </div>
                  <!-- / Layout page -->

                  
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      <!-- / Layout wrapper -->


      <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('/assets/js/dashboards-analytics.js')}}"></script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
          // Keep submenu open after clicking a menu item
          const menuItems = document.querySelectorAll('.menu-item.menu-toggle');
  
          menuItems.forEach(menuItem => {
              menuItem.addEventListener('click', function () {
                  this.classList.toggle('open');
              });
  
              // Check if it's already open (active) based on the current route and keep it open
              if (menuItem.classList.contains('active')) {
                  menuItem.classList.add('open');
              }
          });
      });
  </script>
</body>

