<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    <!-- CSS PolluxUI -->
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">

    <style>
        .profile-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 8px;
        }

        .profile-preview {
            width: 150px;
            object-fit: contain;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container-scroller">

    {{-- NAVBAR --}}
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color:#6a1b9a">
        <div class="navbar-brand-wrapper d-flex justify-content-between align-items-center w-100 px-3">

            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets-admin/images/logo.svg') }}" style="height:40px">
            </a>

            {{-- PROFILE (EDIT PROFILE SAJA) --}}
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-white"
                       data-bs-toggle="dropdown">
                        <img src="{{ auth()->user()->profile_picture
                            ? asset('uploads/'.auth()->user()->profile_picture)
                            : asset('assets-admin/images/default-user.png') }}"
                             class="profile-img">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="typcn typcn-user-outline me-2"></i> Edit Profile
                        </a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

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

<!-- JS -->
<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets-admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
