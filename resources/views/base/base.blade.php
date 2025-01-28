<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <link rel="apple-touch-icon" href="{{ asset('build/theme/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/theme/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    

    @if (request()->is('admin/users*') || request()->is('admin/services*') ||  request()->is('admin/logs*'))
        <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    @endif
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/app-assets/css/pages/dashboard-ecommerce.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/theme/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    @stack('head')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    @yield('layout')
    <!-- BEGIN: Header-->

    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

    <!-- END: Content-->

    <!-- demo chat-->

    <!-- BEGIN: Footer-->

    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('build/theme/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('build/theme/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('build/theme/app-assets/js/scripts/configs/vertical-menu-dark.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('build/theme/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->

    @if (request()->is('admin/users*') || request()->is('admin/services*') || request()->is('admin/logs*'))
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

    <!-- END: Page Vendor JS-->
    <script src="{{ asset('build/theme/app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/js/scripts/pages/table-extended.js') }}"></script>
    <script src="{{ asset('build/theme/app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>

    @endif
    @stack('scripts')
</body>
<!-- END: Body-->
</html>