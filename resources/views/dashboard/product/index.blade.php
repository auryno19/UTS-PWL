@extends('dashboard.layout.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Products</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/product/create" class="btn btn-primary mb-3">Tambah Produk</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Merk</th>
        <th scope="col">Kategori</th>
        <th scope="col">Harga</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($product as $p)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->merk }}</td>
        <td>{{ $p->kategori }}</td>
        <td>{{ $p->harga }}</td>
        <td>
          <a href="/dashboard/product/{{ $p->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
          <a href="/dashboard/product/{{ $p->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/dashboard/product/{{ $p->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')" ><span data-feather="x-circle"></button>
          </form>
        </td>
      </tr>
      @endforeach    
    </tbody>
  </table>
</div>

@endsection

