@extends('layout.main')

@section('content')

<h1 class="mt-3 mb-3 text-center text-light">
    <b> Our Team </b>
</h1>

@if ($team->count())
<div class="d-flex justify-content-center">
<div class="card mb-3 w-50">
    <div style="max-height: 750px; overflow:hidden">
        <img src="{{ asset('storage/' . $team[0]->photo) }}" class="card-img-top" alt="{{ $team[0]->photo }}" class="img-fluid ">
    </div>
    <div class="card-body text-center">
      <h5 class="card-title">{{ $team[0]->nama }}</h5>
      <p class="card-text"> {{ $team[0]->jabatan }}</p>
    </div>
</div>
</div>
@else
  <p class="text-light text-center fs-4">Team masih belum tersedia.</p>
@endif

<div class="container">
    <div class="row">
        @foreach ($team->skip(1) as $t)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div style="max-height: 500px; overflow:hidden">
                        <img src="{{ asset('storage/' . $t->photo) }}" class="card-img-top" alt="{{ $t->photo }}">
                     </div>
                    <div class="card-body">
                    <h5 class="card-title">{{ $t->nama }}</h5>
                    <p class="card-text">{{ $t->jabatan }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    
@endsection