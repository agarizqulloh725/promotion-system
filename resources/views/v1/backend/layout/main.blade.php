<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Promotion Sistem')</title>
    <link rel="stylesheet" href={{asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}>
    <link rel="stylesheet" href={{asset('backend/assets/vendors/ti-icons/css/themify-icons.css')}}>
    <link rel="stylesheet" href={{asset('backend/assets/vendors/css/vendor.bundle.base.css')}}>
    <link rel="stylesheet" href={{asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}>
    <link rel="stylesheet" href={{asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css')}} />
    <link rel="stylesheet" href={{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}>
    <link rel="stylesheet" href={{asset('backend/assets/css/style.css')}}>
    <link rel="shortcut icon" href={{asset('backend/assets/images/favicon.png')}} />
    @stack('css')
</head>
<body>
    <div class="container-scroller">

      @include('v1.backend.layout.navbar')

      <div class="container-fluid page-body-wrapper proBanner-padding-top">

        @include('v1.backend.layout.sidebar')

        <div class="main-panel">

          @yield('content')
          @include('v1.backend.layout.footer')

        </div>

      </div>
    </div>

    <script src={{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}></script>
    <script src={{asset('backend/assets/vendors/chart.js/chart.umd.js')}}></script>
    <script src={{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}></script>
    <script src={{asset('backend/assets/js/off-canvas.js')}}></script>
    <script src={{asset('backend/assets/js/misc.js')}}></script>
    <script src={{asset('backend/assets/js/settings.js')}}></script>
    <script src={{asset('backend/assets/js/todolist.js')}}></script>
    <script src={{asset('backend/assets/js/jquery.cookie.js')}}></script>
    <script src={{asset('backend/assets/js/dashboard.js')}}></script>
    @stack('script')
</body>
</html>