@extends('layouts.app')
@section('title', 'Data Peserta')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Data Peserta</h4>
        <small class="text-muted">Daftar seluruh peserta seminar</small>
    </div>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('peserta.create') }}" class="btn btn-success">
            + Tambah Peserta
        </a>
    @endif
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form method="GET" action="{{ route('peserta.index') }}" class="row mb-3">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari nama atau email..."
                           value="{{ request('search') }}">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Event</th>

                        @if(auth()->user()->role === 'admin')
                            <th width="150">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peserta as $i => $item)
                    <tr>
                        <td>{{ $peserta->firstItem() + $i }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->alamat ?? '-' }}</td>
                        <td>{{ $item->event->judul_event ?? '-' }}</td>

                        @if(auth()->user()->role === 'admin')
                        <td class="text-center">
                            <a href="{{ route('peserta.edit', $item->id) }}"
                               class="btn btn-info btn-sm mb-1">
                                Edit
                            </a>

                            <form action="{{ route('peserta.destroy', $item->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ auth()->user()->role === 'admin' ? 7 : 6 }}"
                            class="text-center text-muted">
                            Data peserta belum ada
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $peserta->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

<hr>

<div class="d-flex justify-content-end mt-3">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-danger">
            Logout
        </button>
    </form>
</div>

@endsection
