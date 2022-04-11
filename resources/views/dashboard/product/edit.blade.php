@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Produk</h1>
  </div>

  <div class="col-lg-8">
      <form method="post" action="/dashboard/product/{{ $product->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="kode" class="form-label">Kode Produk</label>
          <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode' , $product->kode) }}">
            @error('kode')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $product->nama) }}">
              @error('nama')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="merk" class="form-label">Merk Produk</label>
            <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" value="{{ old('merk', $product->merk) }}">
              @error('merk')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
           <select class="form-select" name="kategori" >
              @foreach ($category as $c)
              @if (old('kategori', $product->kategori) === $c->name)
                <option value="{{ $c->name }}" selected>{{ $c->name }}</option>
              @else
                <option value="{{ $c->name }}">{{ $c->name }}</option>
              @endif
              @endforeach
           </select>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $product->harga) }}">
              @error('harga')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label @error('photo') is-invalid @enderror">Photo Produk</label>
            <input type="hidden" name="oldPhoto" value="{{ $product->photo }}">
            <input class="form-control" type="file" id="photo" name="photo">
            @error('photo')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            
              @error('deskripsi')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>


@endsection