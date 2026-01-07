@extends('layouts.app')
@section('title', 'Data Event')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Data Event</h4>
        <small class="text-muted">Daftar seluruh event seminar</small>
    </div>

    <a href="{{ route('event.create') }}" class="btn btn-primary">
        + Tambah Event
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="thead-light">
                    <tr>
                        <th width="60">No</th>
                        <th>Judul Event</th>
                        <th>Tanggal</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $i => $event)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $event->judul_event }}</td>
                            <td>{{ $event->tanggal ?? '-' }}</td>
                            <td>
                                <a href="{{ route('event.edit', $event->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('event.destroy', $event->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin hapus event ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum ada event
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
