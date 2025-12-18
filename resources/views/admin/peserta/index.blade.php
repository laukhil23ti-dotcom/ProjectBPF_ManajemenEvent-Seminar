<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PolluxUI Admin</title>

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
                    <a class="nav-link">
                        <i class="typcn typcn-device-desktop menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
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
                        <small class="text-muted">List seluruh data peserta</small>
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

                <!-- CARD TABLE -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <!-- FILTER -->
                        <form method="GET" action="{{ route('peserta.index') }}" class="row g-2 mb-3">
                            <div class="col-md-2">
                                <select name="gender" class="form-control" onchange="this.form.submit()">
                                    <option value="">All Gender</option>
                                    <option value="Male" {{ request('gender')=='Male'?'selected':'' }}>Male</option>
                                    <option value="Female" {{ request('gender')=='Female'?'selected':'' }}>Female</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                           value="{{ request('search') }}" placeholder="Cari peserta...">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>

                        <!-- TABLE -->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>First</th>
                                        <th>Last</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peserta as $i => $item)
                                        <tr>
                                            <td>{{ $peserta->firstItem() + $i }}</td>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->birthday }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('peserta.edit', $item->peserta_id) }}"
                                                   class="btn btn-info btn-sm mb-1">
                                                    Edit
                                                </a>
                                                <form action="{{ route('peserta.destroy', $item->peserta_id) }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Hapus data peserta ini?')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
                        PolluxUI + Laravel
                    </div>
                </div>
            </footer>
        </div>

    </div>
</div>

<!-- JS -->
<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets-admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>

</body>
</html>
