@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edit Event</h1>

    <form action="{{ route('event.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Judul Event --}}
        <div class="mb-3">
            <label class="form-label">Judul Event</label>
            <input 
                type="text" 
                name="judul"
                class="form-control"
                value="{{ old('judul', $event->judul) }}"
                required
            >
        </div>

        {{-- Tanggal Event --}}
        <div class="mb-3">
            <label class="form-label">Tanggal Event</label>
            <input 
                type="date"
                name="tanggal"
                class="form-control"
                value="{{ old('tanggal', $event->tanggal) }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Update Event
        </button>

        <a href="{{ route('event.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>
@endsection
