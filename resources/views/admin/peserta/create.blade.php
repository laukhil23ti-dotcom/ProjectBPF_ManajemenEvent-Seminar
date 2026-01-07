<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peserta Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <h4>Form Pendaftaran Event</h4>
                </div>

                <div class="card-body">

                    {{-- ALERT SUCCESS --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form action="{{ route('peserta.public.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text"
                                       name="nama"
                                       class="form-control"
                                       placeholder="Masukkan nama lengkap"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Masukkan email aktif"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">No Handphone</label>
                                <input type="text"
                                       name="no_hp"
                                       class="form-control"
                                       placeholder="08xxxxxxxxxx"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pilih Event</label>
                                <select name="event_id" class="form-control" required>
                                    <option value="">-- Pilih Event --</option>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">
                                            {{ $event->judul ?? $event->judul_event ?? 'Event #' . $event->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat"
                                          class="form-control"
                                          rows="3"
                                          placeholder="Masukkan alamat lengkap"></textarea>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('peserta.home') }}" class="btn btn-light me-2">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Daftar Event
                            </button>
                        </div>

                    </form>
                    {{-- END FORM --}}

                </div>
            </div>

        </div>
    </div>
</div>

//JS ADMIN TEMPLATE
<script src="{{ asset('assets-admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets-admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets-admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets-admin/js/template.js') }}"></script>

</body>
</html>
