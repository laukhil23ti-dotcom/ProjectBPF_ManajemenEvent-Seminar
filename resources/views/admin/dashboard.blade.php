<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard Admin</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
</head>
<body>

<div class="container-scroller">

  <!-- NAVBAR -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo">
          <img src="{{ asset('assets-admin/images/logo.svg') }}" alt="logo"/>
        </a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-sm btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid page-body-wrapper">

    <!-- SIDEBAR -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="typcn typcn-device-desktop menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('peserta.index') }}">
            <i class="typcn typcn-group-outline menu-icon"></i>
            <span class="menu-title">Peserta</span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- MAIN PANEL -->
    <div class="main-panel">
      <div class="content-wrapper">

        <!-- INFO LOGIN -->
        <div class="alert alert-success">
          Login sebagai <strong>{{ Auth::user()->name }}</strong> (ADMIN)
        </div>

        <!-- TABEL PESERTA -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Peserta Terbaru</h4>

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
                  @forelse($peserta as $i => $p)
                  <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->event_id }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="text-center text-muted">
                      Belum ada peserta
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <a href="{{ route('peserta.index') }}" class="btn btn-primary mt-3">
              Lihat Semua Peserta
            </a>
          </div>
        </div>

      </div>

      <!-- FOOTER -->
      <footer class="footer">
        <div class="card">
          <div class="card-body text-center">
            © {{ date('Y') }} PolluxUI + Laravel
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
