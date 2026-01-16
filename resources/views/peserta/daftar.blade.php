<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Seminar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">

<div class="max-w-xl mx-auto mt-16 bg-white p-8 rounded-2xl shadow">
    <h2 class="text-2xl font-bold mb-2">Form Pendaftaran Seminar</h2>
    <p class="text-slate-600 mb-6">
        Seminar: <span class="font-semibold text-indigo-600">{{ $event->judul_event }}</span>
    </p>

    <form method="POST" action="{{ route('peserta.store') }}" class="space-y-4">
        @csrf

        {{-- EVENT ID OTOMATIS --}}
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <div>
            <label class="text-sm font-medium">Nama Lengkap</label>
            <input type="text" name="nama"
                   class="w-full border rounded-lg px-4 py-2 mt-1" required>
        </div>

        <div>
            <label class="text-sm font-medium">Email</label>
            <input type="email" name="email"
                   class="w-full border rounded-lg px-4 py-2 mt-1" required>
        </div>

        <div>
            <label class="text-sm font-medium">No HP</label>
            <input type="text" name="no_hp"
                   class="w-full border rounded-lg px-4 py-2 mt-1" required>
        </div>

        <div>
            <label class="text-sm font-medium">Alamat</label>
            <textarea name="alamat"
                      class="w-full border rounded-lg px-4 py-2 mt-1"
                      placeholder="Opsional"></textarea>
        </div>

        <button
            class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
            Daftar Sekarang
        </button>
    </form>
</div>

</body>
</html>
