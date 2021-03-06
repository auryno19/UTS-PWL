@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Produk Baru</h1>
  </div>

  <div class="col-lg-8">
      <form method="post" action="/dashboard/product" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="kode" class="form-label">Kode Produk</label>
          <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}">
            @error('kode')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
              @error('nama')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="merk" class="form-label">Merk Produk</label>
            <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" value="{{ old('merk') }}">
              @error('merk')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
           <select class="form-select" name="category_id" >
              @foreach ($category as $c)
              @if (old('category_id') == $c->id)
                <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
              @else
                <option value="{{ $c->id }}">{{ $c->name }}</option>
              @endif
              @endforeach
           </select>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
              @error('harga')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label @error('photo') is-invalid @enderror">Photo Produk</label>
            <input class="form-control" type="file" id="photo" name="photo">
            @error('photo')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
            
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