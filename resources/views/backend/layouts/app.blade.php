<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->

    <title>@yield('title') - {{ config('app.name','Laravel') }}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/main/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/toastr/toastr.min.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/main/css/skin_color.css') }}">
    @stack('styles')
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
<div class="wrapper">
    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.layouts.partials.header')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.layouts.partials.left-sidebar')
    <!-- ########## END: LEFT PANEL ########## -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                @section('content')
                @show
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- Footer -->
    @include('backend.layouts.partials.footer')
    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.layouts.partials.right-sidebar')
    <!-- ########## END: RIGHT PANEL ########## --->
</div>
<!-- ./wrapper -->

<!-- Vendor JS -->
<script src="{{ asset('backend/main/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('backend/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('backend/assets/vendor_components/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<!-- Sunny Admin App -->
<script src="{{ asset('backend/main/js/template.js') }}"></script>
<script src="{{ asset('backend/main/js/pages/dashboard.js') }}"></script>
@stack('scripts')
</body>

</html>

