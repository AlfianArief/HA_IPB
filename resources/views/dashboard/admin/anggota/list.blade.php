@extends('dashboard.admin.main')
@section('title','Informasi Anggota Cabang')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

@if ($message = Session::get('fail'))
  <div class="alert alert-danger">
    <p>{{ $message }}</p>
  </div>
@endif

<div class="box">
  <table class="table table-striped container">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Aksi</th>
        <th scope="col">Request</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listanggota as $list)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$list->judul}}</td>
        <td>{{$list->name}}</td>
        <td>{{$list->email}}</td>
       
        <td>
          <a class="btn btn-success" href="admin/mutasi/{{ $list->id }}" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Mutasi</a>
        </td>
        <td>
          <a class="btn btn-primary position relative" href="admin/request/{{ $list->id_users }}" role="button">Check Request</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection