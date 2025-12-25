<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">

    <style>
        body {
            background-color: #f5f7ff;
        }
        .login-wrapper {
            height: 100vh;
        }
    </style>
</head>
<body>

<div class="container login-wrapper d-flex align-items-center justify-content-center">

    <div class="col-md-4">
        <div class="card shadow-sm">

            <div class="card-body">
                <h4 class="text-center mb-4">Login Sistem</h4>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- EMAIL -->
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Email"
                               required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group mb-4">
                        <label>Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Password"
                               required>
                    </div>

                    <!-- BUTTON -->
                    <button class="btn btn-primary w-100">
                        Login
                    </button>
                </form>
            </div>

        </div>

        <p class="text-center text-muted mt-3">
            Event Seminar © {{ date('Y') }}
        </p>
    </div>

</div>

<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
</body>
</html>