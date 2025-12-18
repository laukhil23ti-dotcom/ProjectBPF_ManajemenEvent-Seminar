<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Peserta</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
</head>
<body>

<div class="container-scroller">
<div class="container-fluid page-body-wrapper">

    <div class="main-panel w-100">
    <div class="content-wrapper">

        <!-- HEADER -->
        <div class="mb-4">
            <h4 class="mb-1">Edit Peserta Seminar</h4>
            <small class="text-muted">Perbarui data peserta dengan lengkap</small>
        </div>

        <!-- CARD FORM -->
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- NAMA -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama"
                                   class="form-control"
                                   value="{{ old('nama', $peserta->nama) }}"
                                   placeholder="Masukkan nama peserta"
                                   required>
                        </div>

                        <!-- EMAIL -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                   class="form-control"
                                   value="{{ old('email', $peserta->email) }}"
                                   placeholder="Masukkan email"
                                   required>
                        </div>

                        <!-- NO HP -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No Handphone</label>
                            <input type="text" name="no_hp"
                                   class="form-control"
                                   value="{{ old('no_hp', $peserta->no_hp) }}"
                                   placeholder="08xxxxxxxxxx"
                                   required>
                        </div>

                        <!-- EVENT -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Event ID</label>
                            <input type="text" name="event_id"
                                   class="form-control"
                                   value="{{ old('event_id', $peserta->event_id) }}"
                                   placeholder="Contoh: 1"
                                   required>
                        </div>

                        <!-- ALAMAT -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap">{{ old('alamat', $peserta->alamat) }}</textarea>
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('peserta.index') }}"
                           class="btn btn-light me-2">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Update Peserta
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
    </div>

</div>
</div>

<!-- JS -->
<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>

</body>
</html>
