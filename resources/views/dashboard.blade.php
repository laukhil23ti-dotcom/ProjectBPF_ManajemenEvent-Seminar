@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="card p-4">
    <h4>Selamat datang, {{ auth()->user()->name }}!</h4>

    @if(auth()->user()->role === 'admin')
    <div class="card mt-3">
        <div class="card-body">
            <h5>Peserta Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Event</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peserta as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->no_hp }}</td>
                            <td>{{ $p->event->judul_event ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada peserta</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('peserta.index') }}" class="btn btn-primary mt-3">Lihat Semua Peserta</a>
        </div>
    </div>
    @endif

</div>
@endsection
