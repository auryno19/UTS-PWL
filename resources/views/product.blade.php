@extends('layout.main')

@section('content')

<h1 class="mt-3 mb-3 text-center text-light">
    <b> Our Products </b>
</h1>

<div class="row justify-content-center">
    <div class="col-md-6 mb-3">
        <form action="/product">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Produk" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if ($product->count())
<div class="card mb-3">
    <div style="max-height: 400px; overflow:hidden">
        <img src="{{ asset('storage/' . $product[0]->photo) }}" class="card-img-top" alt="{{ $product[0]->photo }}" class="img-fluid ">
    </div>
    <div class="card-body text-center">
      <h5 class="card-title">{{ $product[0]->nama }}</h5>
      <p class="card-text"> {{ $product[0]->deskripsi }}</p>
      <p class="card-text"><small class="text-muted">Last updated {{ $product[0]->created_at->diffForHumans() }}</small></p>
      <a href="/product/{{ $product[0]->id }}" class="btn btn-primary">Read more</a>
    </div>
  </div>
@else
  <p class="text-light text-center fs-4">Produk masih belum tersedia.</p>
@endif
    
<div class="container">
    <div class="row">
        @foreach ($product->skip(1) as $p)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div style="max-height: 500px; overflow:hidden">
                        <img src="{{ asset('storage/' . $p->photo) }}" class="card-img-top" alt="{{ $p->photo }}">
                     </div>
                    <div class="card-body">
                    <h5 class="card-title">{{ $p->nama }}</h5>
                    <p class="card-text">{{ $p->deskripsi }}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ $p->created_at->diffForHumans() }}</small></p>
                    <a href="/product/{{ $p->id }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


    


@endsection