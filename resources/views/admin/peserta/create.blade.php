<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>

  <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets-admin/images/favicon.png') }}">
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
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
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

<!-- CHARTS -->
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#charts">
    <i class="typcn typcn-chart-pie-outline menu-icon"></i>
    <span class="menu-title">Charts</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="charts">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link">ChartJS</a></li>
    </ul>
  </div>
</li>

<!-- TABLES -->
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#tables">
    <i class="typcn typcn-th-small-outline menu-icon"></i>
    <span class="menu-title">Tables</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="tables">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link">Basic Table</a></li>
    </ul>
  </div>
</li>

<!-- USER PAGES -->
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#auth">
    <i class="typcn typcn-user-add-outline menu-icon"></i>
    <span class="menu-title">User Pages</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="auth">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link">Login</a></li>
      <li class="nav-item"><a class="nav-link">Register</a></li>
    </ul>
  </div>
</li>

</ul>
</nav>

<div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Pelanggan</h1>
                <p class="mb-0">Form untuk menambahkan data pelanggan baru.</p>
            </div>
            <div>
                <a href="#" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action={{ route('peserta.store') }} method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                <!-- First Name -->
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                                </div>

                                <!-- Last Name -->
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <!-- Birthday -->
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" id="birthday" name="birthday" class="form-control">
                                </div>

                                <!-- Gender -->
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option value="">-- Pilih --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12">
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" required>
                                </div>

                                <!-- Phone -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>

                                <!-- Buttons -->
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('pelanggan.index') }}"
                                        class="btn btn-outline-secondary ms-2">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

</div>

<footer class="footer">
  <div class="card">
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
<script src="{{ asset('assets-admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>
<script src="{{ asset('assets-admin/js/settings.js') }}"></script>
<script src="{{ asset('assets-admin/js/todolist.js') }}"></script>

<script src="{{ asset('assets-admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/chart.js') }}"></script>

</body>
</html>
