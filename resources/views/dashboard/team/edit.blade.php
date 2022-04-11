@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Tim</h1>
  </div>

  <div class="col-lg-8">
      <form method="post" action="/dashboard/team/{{ $team->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $team->nama) }}">
              @error('nama')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan', $team->jabatan) }}">
              @error('jabatan')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
              @enderror
          </div>
         
          <div class="mb-3">
            <label for="photo" class="form-label @error('photo') is-invalid @enderror">Photo Profil</label>
            <input type="hidden" name="oldPhoto" value="{{ $team->photo }}">
            <input class="form-control" type="file" id="photo" name="photo">
            @error('photo')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>

@endsection