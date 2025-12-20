<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Seminar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 text-slate-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-sm px-10 py-5 flex justify-between items-center">
    <h1 class="text-xl font-bold text-indigo-600">SeminarHub</h1>
    <span class="text-sm text-slate-500">Event & Seminar Kampus</span>
</nav>

<!-- HEADER -->
<section class="max-w-7xl mx-auto px-6 mt-14 mb-10">
    <h2 class="text-4xl font-extrabold mb-3">
        Pilih Seminar Favoritmu 🎓
    </h2>
    <p class="text-slate-600 max-w-2xl">
        Ikuti seminar berkualitas untuk meningkatkan skill,
        kreativitas, dan personal branding kamu.
    </p>
</section>

<!-- SEMINAR LIST -->
<section class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 pb-20">

    <!-- SEMINAR ANIMASI -->
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-6 flex flex-col">
        <div class="mb-4">
            <span class="inline-block bg-pink-100 text-pink-600 text-xs px-3 py-1 rounded-full">
                Kreatif
            </span>
        </div>

        <h3 class="text-xl font-bold mb-2">
            Seminar Animasi Digital
        </h3>

        <p class="text-slate-600 text-sm mb-4">
            Pelajari dasar animasi 2D & 3D, workflow industri kreatif,
            dan tips masuk dunia animasi profesional.
        </p>

        <div class="text-sm text-slate-500 mb-6">
            📅 22 Juni 2026 <br>
            📍 Auditorium, Politeknik Caltex Riau
        </div>

        <a href="{{ url('/daftar?event=animasi') }}"
           class="mt-auto text-center bg-pink-500 text-white
                  py-3 rounded-xl font-semibold
                  hover:bg-pink-600 transition">
            Daftar Seminar
        </a>
    </div>

    <!-- SEMINAR MACHINE LEARNING -->
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-6 flex flex-col">
        <div class="mb-4">
            <span class="inline-block bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">
                Teknologi
            </span>
        </div>

        <h3 class="text-xl font-bold mb-2">
            Seminar Machine Learning
        </h3>

        <p class="text-slate-600 text-sm mb-4">
            Mengenal konsep Machine Learning, AI, dan penerapannya
            dalam dunia industri dan data science.
        </p>

        <div class="text-sm text-slate-500 mb-6">
            📅 24 Juni 2026 <br>
            📍 Gedung Serba Guna, Politeknik Caltex Riau
        </div>

        <a href="{{ url('/daftar?event=ml') }}"
           class="mt-auto text-center bg-blue-500 text-white
                  py-3 rounded-xl font-semibold
                  hover:bg-blue-600 transition">
            Daftar Seminar
        </a>
    </div>

    <!-- SEMINAR BRANDING DIRI -->
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-6 flex flex-col">
        <div class="mb-4">
            <span class="inline-block bg-emerald-100 text-emerald-600 text-xs px-3 py-1 rounded-full">
                Karier
            </span>
        </div>

        <h3 class="text-xl font-bold mb-2">
            Seminar Personal Branding
        </h3>

        <p class="text-slate-600 text-sm mb-4">
            Bangun citra diri yang kuat, percaya diri, dan
            siap bersaing di dunia kerja & media sosial.
        </p>

        <div class="text-sm text-slate-500 mb-6">
            📅 26 Juni 2026 <br>
            📍 Amphi Depan, Politeknik Caltex Riau
        </div>

        <a href="{{ url('/daftar?event=branding') }}"
           class="mt-auto text-center bg-emerald-500 text-white
                  py-3 rounded-xl font-semibold
                  hover:bg-emerald-600 transition">
            Daftar Seminar
        </a>
    </div>

</section>

<!-- FOOTER -->
<footer class="text-center text-sm text-slate-500 py-6">
    © {{ date('Y') }} SeminarHub • All rights reserved
</footer>

</body>
</html>
