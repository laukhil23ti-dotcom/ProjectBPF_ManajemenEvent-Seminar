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

<!-- MAIN -->
<div class="main-panel">
<div class="content-wrapper">

<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Line Chart</h4>
        <canvas id="lineChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bar Chart</h4>
        <canvas id="barChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Area Chart</h4>
        <canvas id="areaChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Doughnut Chart</h4>
        <canvas id="doughnutChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pie Chart</h4>
        <canvas id="pieChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Scatter Chart</h4>
        <canvas id="scatterChart"></canvas>
      </div>
    </div>
  </div>
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
