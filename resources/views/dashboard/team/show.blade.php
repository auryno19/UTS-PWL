@extends('dashboard.layout.main')

@section('container')
  
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card"  style="width: 30rem;">
            <img src="{{ asset('storage/' . $team->photo) }}" class="card-img-top" alt="{{ $team->nama }}">
            <div class="card-header">
                <div class="text-center">
                <b>{{ $team->nama }}</b>
                </div>
            </div>
            <div class="card body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">{{ $team->jabatan }}</li>

            </div>
            <a class="btn btn-success mt-3 mb-3" href="/dashboard/team">kembali</a>
        </div>
    </div>
</div>


@endsection
