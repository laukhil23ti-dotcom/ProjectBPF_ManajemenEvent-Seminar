<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peserta (Staff)</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
</head>

<body>
<div class="container-scroller">

<!-- NAVBAR -->
<nav class="navbar fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <span class="navbar-brand">STAFF PANEL</span>
        </div>
    </div>
</nav>

<div class="container-fluid page-body-wrapper">

<!-- SIDEBAR -->
<nav class="sidebar sidebar-offcanvas">
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ route('staff.dashboard') }}" class="nav-link">
                <i class="typcn typcn-device-desktop"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link">
                <i class="typcn typcn-group-outline"></i>
                <span class="menu-title">Data Peserta</span>
            </a>
        </li>
    </ul>
</nav>

<!-- CONTENT -->
<div class="main-panel">
    <div class="content-wrapper">

        <h4 class="mb-3">Data Peserta Seminar</h4>
        <p class="text-muted">Akses Staff (read-only)</p>

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peserta as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->event_id }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada data peserta
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>

    </div>
</div>

</div>
</div>

<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>
</body>
</html>