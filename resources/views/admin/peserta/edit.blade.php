<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta</title>
</head>
<body>

<h3>Edit Peserta Seminar</h3>

<form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ $peserta->nama }}" required>
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ $peserta->email }}" required>
    </div>

    <div>
        <label>No HP</label><br>
        <input type="text" name="no_hp" value="{{ $peserta->no_hp }}" required>
    </div>

    <div>
        <label>Alamat</label><br>
        <textarea name="alamat">{{ $peserta->alamat }}</textarea>
    </div>

    <div>
        <label>Event ID</label><br>
        <input type="text" name="event_id" value="{{ $peserta->event_id }}" required>
    </div>

    <br>
    <button type="submit">Update</button>
    <a href="{{ route('peserta.index') }}">Kembali</a>

</form>

</body>
</html>
