<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">

<div class="max-w-xl mx-auto mt-16 bg-white p-8 rounded-2xl shadow">
    <h2 class="text-2xl font-bold mb-6">Form Pendaftaran Seminar</h2>

    <form method="POST" action="{{ route('peserta.public.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="text-sm font-medium">Pilih Seminar</label>
            <select name="event_id"
                    class="w-full border rounded-lg px-4 py-2 mt-1" required>
                <option value="">-- Pilih Event --</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">
                        {{ $event->judul_event }} ({{ $event->tanggal }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="text-sm">Nama Lengkap</label>
            <input type="text" name="nama"
                   class="w-full border rounded-lg px-4 py-2 mt-1" required>
        </div>

        <div>
            <label class="text-sm">Email</label>
            <input type="email" name="email"
                   class="w-full border rounded-lg px-4 py-2 mt-1" required>
        </div>

        <div>
            <label class="text-sm">No HP</label>
            <input type="text" name="no_hp"
                   class="w-full border rounded-lg px-4 py-2 mt-1" required>
        </div>

        <div>
            <label class="text-sm">Alamat</label>
            <textarea name="alamat"
                      class="w-full border rounded-lg px-4 py-2 mt-1"></textarea>
        </div>

        <button class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700">
            Daftar Sekarang
        </button>
    </form>
</div>

</body>
</html>
