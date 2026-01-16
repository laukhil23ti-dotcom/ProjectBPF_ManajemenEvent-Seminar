<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Seminar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 text-slate-800">

<nav class="bg-white shadow-sm px-10 py-5 flex justify-between items-center">
    <div style="--brand-color:#4f46e5">
         @include('partials.brand')
    </div>

    <span class="text-sm text-slate-500">Event & Seminar Kampus</span>
</nav>

<section class="max-w-7xl mx-auto px-6 mt-14 mb-10">
    <h2 class="text-4xl font-extrabold mb-3">
        Pilih Seminar Favoritmu 🎓
    </h2>
    <p class="text-slate-600 max-w-2xl">
        Ikuti seminar berkualitas untuk meningkatkan skill,
        kreativitas, dan personal branding kamu.
    </p>
</section>

<section class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 pb-20">

@forelse($events as $event)
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-6 flex flex-col">

        <div class="mb-4">
            <span class="inline-block bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full">
                {{ $event->kategori ?? 'Seminar' }}
            </span>
        </div>

        <h3 class="text-xl font-bold mb-2">
            {{ $event->judul_event }}
        </h3>

        <p class="text-slate-600 text-sm mb-4">
            {{ $event->deskripsi ?? 'Tidak ada deskripsi' }}
        </p>

        <div class="text-sm text-slate-500 mb-6">
            📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }} <br>
            📍 {{ $event->lokasi ?? '-' }}
        </div>

        <a href="{{ route('peserta.create', ['event_id' => $event->id]) }}"
           class="mt-auto text-center bg-indigo-500 text-white
                  py-3 rounded-xl font-semibold
                  hover:bg-indigo-600 transition">
            Daftar Seminar
        </a>
    </div>

@empty
    <div class="col-span-3 text-center text-slate-500">
        Belum ada seminar yang tersedia.
    </div>
@endforelse

</section>

<footer class="text-center text-sm text-slate-500 py-6">
    © {{ date('Y') }} SeminarHub • All rights reserved
</footer>

</body>
</html>
