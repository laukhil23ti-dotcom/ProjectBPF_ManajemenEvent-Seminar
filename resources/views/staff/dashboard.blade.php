@extends('layouts.app')

@section('title','Dashboard Staff')

@section('content')
<h3>Dashboard Staff</h3>
<p class="text-muted">Login sebagai <b>STAFF</b></p>

<div class="row mt-4">
    @foreach ($events as $event)
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4>{{ $event->peserta_count }}</h4>
                    <p>{{ $event->judul_event }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
