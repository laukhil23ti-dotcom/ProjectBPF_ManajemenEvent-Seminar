<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
</head>
<body>

<div class="container-scroller">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    <div class="container-fluid page-body-wrapper">

        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- CONTENT --}}
        <div class="main-panel w-100">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>

    </div>
</div>

<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets-admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>

</body>
</html>
