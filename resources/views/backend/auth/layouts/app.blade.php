<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>@yield('title') - {{ config('app.name','Laravel') }}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/main/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/toastr/toastr.min.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/main/css/skin_color.css') }}">
</head>

<body class="hold-transition theme-primary bg-gradient-primary">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">
        <div class="col-12">
            @section('content')
            @show
        </div>
    </div>
</div>

<!-- Vendor JS -->
<script src="{{ asset('backend/main/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor_components/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
</body>

</html>
