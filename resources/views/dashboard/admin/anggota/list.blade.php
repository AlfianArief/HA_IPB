@extends('dashboard.admin.main')
@section('title','Informasi Anggota Cabang')

@section('content')

<div class="box">
  <table class="table table-striped container">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listanggota as $list)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$list->judul}}</td>
        <td>{{$list->name}}</td>
        <td>{{$list->email}}</td>
        <td><a class="btn btn-success" href="admin/mutasi/{{ $list->id }}" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Mutasi</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection