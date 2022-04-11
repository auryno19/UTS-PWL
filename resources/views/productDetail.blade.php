@extends('layout.main')

@section('content')

<h1 class="mt-3 mb-3 text-center text-light">
    <b> Detail Product </b>
</h1>

<div class="container mt-3 mb-3">
    <div class="row justify-content-center align-items-center">
        <div class="card"  style="width: 30rem;">
            <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top" alt="{{ $product->nama }}">
            <div class="card-header">
                Detail Produk
            </div>
            <div class="card body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kode :  </b>{{ $product->kode }}</li>
                    <li class="list-group-item"><b>Nama : </b>{{ $product->nama }}</li>
                    <li class="list-group-item"><b>Merk : </b>{{ $product->merk }}</li>
                    <li class="list-group-item"><b>Kategori : </b>{{ $product->kategori }}</li>
                    <li class="list-group-item"><b>Harga : </b>Rp.{{ $product->harga }}</li>
                    <li class="list-group-item"><b>Deskripsi : </b>{{ $product->deskripsi }}</li>
            </div>
            <a class="btn btn-success mt-3 mb-3" href="/product">kembali</a>
        </div>
    </div>
</div>

@endsection