<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peserta</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets-admin/images/favicon.png') }}">
</head>

<body>
<div class="container-scroller">

    <!-- NAVBAR -->
    <nav class="navbar fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo">
                    <img src="{{ asset('assets-admin/images/logo.svg') }}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="minimize">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">

        <!-- SIDEBAR -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="typcn typcn-device-desktop menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ route('peserta.index') }}" class="nav-link">
                        <i class="typcn typcn-group-outline menu-icon"></i>
                        <span class="menu-title">Peserta</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- MAIN PANEL -->
        <div class="main-panel w-100">
            <div class="content-wrapper">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="mb-1">Data Peserta</h4>
                        <small class="text-muted">Daftar seluruh peserta seminar</small>
                    </div>
                    <a href="{{ route('peserta.create') }}" class="btn btn-success">
                        + Tambah Peserta
                    </a>
                </div>

                <!-- ALERT -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <!-- CARD -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <!-- SEARCH -->
                        <form method="GET" action="{{ route('peserta.index') }}" class="row mb-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text"
                                           name="search"
                                           class="form-control"
                                           placeholder="Cari nama atau email..."
                                           value="{{ request('search') }}">
                                    <button class="btn btn-primary">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- TABLE -->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Event</th>
                                        <th width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($peserta as $i => $item)
                                    <tr>
                                        <td>{{ $peserta->firstItem() + $i }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->alamat ?? '-' }}</td>
                                        <td>{{ $item->event_id }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('peserta.edit', $item->id) }}"
                                               class="btn btn-info btn-sm mb-1">
                                                Edit
                                            </a>

                                            <form action="{{ route('peserta.destroy', $item->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin hapus data ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">
                                            Data peserta belum ada
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- PAGINATION -->
                        <div class="mt-3">
                            {{ $peserta->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>

            </div>

            <!-- FOOTER -->
            <footer class="footer mt-auto">
                <div class="card mb-0">
                    <div class="card-body text-center">
                        © {{ date('Y') }} PolluxUI + Laravel
                    </div>
                </div>
            </footer>
        </div>

    </div>
</div>

<!-- JS -->
<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></cript>
<script src="{{ asset('assets-admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>

</body>
</html>