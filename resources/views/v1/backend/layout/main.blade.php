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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src={{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}></script>
    <script src={{asset('backend/assets/vendors/chart.js/chart.umd.js')}}></script>
    <script src={{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}></script>
    <script src={{asset('backend/assets/js/off-canvas.js')}}></script>
    <script src={{asset('backend/assets/js/misc.js')}}></script>
    <script src={{asset('backend/assets/js/settings.js')}}></script>
    <script src={{asset('backend/assets/js/todolist.js')}}></script>
    <script src={{asset('backend/assets/js/jquery.cookie.js')}}></script>
    <script src={{asset('backend/assets/js/dashboard.js')}}></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('utils.js') }}"></script>
    <script>
        const tokenn = getCookieValue('access_token');
        function fetchMe() {
            $.ajax({
                url: '/api/v1/me/',
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + tokenn
                },
                contentType: 'application/json',
                success: function(response) {
                var myuserr = response.user.id;
                var branchId = response.user.branch_id;

                  const profileNames = document.querySelectorAll('.nameProfile');
                  const userName = response.user.name;
                  profileNames.forEach(element => {
                      element.textContent = userName;
                  });
                  
                  const profilepermission = document.querySelectorAll('.roleUser');
                  const role = response.permission;
                  profilepermission.forEach(element => {
                      element.textContent = role;
                  });

                const proCategoryLink = document.querySelector("a[href='/admin/pro-category']");
                const brandLink = document.querySelector("a[href='/admin/brand']");
                
                if (branchId !== null && branchId !== '') {
                    // Pro Category
                    const proCategoryLink = document.querySelector("a[href='/admin/pro-category']");
                    proCategoryLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });

                    // Brand
                    const brandLink = document.querySelector("a[href='/admin/brand']");
                    brandLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });

                    // Products
                    const productsLink = document.querySelector("a[href='/admin/products']");
                    productsLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });

                    // Promo Product
                    const promoProductLink = document.querySelector("a[href='/admin/product-promo']");
                    promoProductLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });

                    // Branch
                    const branchLink = document.querySelector("a[href='/admin/branch']");
                    branchLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });

                    // Specification
                    const specificationLink = document.querySelector("a[href='/admin/spesification']");
                    specificationLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });

                    // Color
                    const colorLink = document.querySelector("a[href='/admin/color']");
                    colorLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });

                    // User Management
                    const userRoleLink = document.querySelector("a[href='/admin/user-role']");
                    userRoleLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Anda Tidak Memiliki Akses',
                            text: 'Hubungi admin untuk informasi hak akses terkait',
                        });
                    });
                }

                },
                error: function(error) {
                    console.log('Error fetching product:', error);
                }
            });
        }

      fetchMe();
    </script>
    @stack('script')
</body>
</html>
