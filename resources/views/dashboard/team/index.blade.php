@extends('dashboard.layout.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Team</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-6">
  <a href="/dashboard/team/create" class="btn btn-primary mb-3">Tambah Tim</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($team as $t)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $t->nama }}</td>
        <td>{{ $t->jabatan }}</td>
        <td>
        <a href="/dashboard/team/{{ $t->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
          <a href="/dashboard/team/{{ $t->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/dashboard/team/{{ $t->id }}" method="post" class="d-inline">
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

