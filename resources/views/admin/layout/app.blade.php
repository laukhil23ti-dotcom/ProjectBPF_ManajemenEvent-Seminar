<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
</head>
<body>

<div class="container-scroller">

    {{-- NAVBAR --}}
    @include('layout.navbar')

    <div class="container-fluid page-body-wrapper">

        {{-- SIDEBAR --}}
        @include('layout.sidebar')

        {{-- CONTENT --}}
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>

    </div>
</div>

<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
</body>
</html>
