<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Event</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/vertical-layout-light/style.css') }}">
</head>
<body>

<div class="container mt-5">
    <h3>Tambah Event</h3>

    <form action="{{ route('event.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Judul Event</label>
            <input type="text" name="judul_event" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('event.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
