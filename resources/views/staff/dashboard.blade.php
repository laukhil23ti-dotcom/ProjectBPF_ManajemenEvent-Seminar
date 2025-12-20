@extends('layout.app')

@section('title','Dashboard Staff')

@section('content')
<h3>Dashboard Staff</h3>
<p class="text-muted">Login sebagai <b>STAFF</b></p>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h4>{{ $totalPeserta ?? 0 }}</h4>
                <p>Total Peserta</p>
            </div>
        </div>
    </div>
</div>
@endsection
