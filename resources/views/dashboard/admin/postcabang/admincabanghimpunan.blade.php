@extends('dashboard.admin.main')
@section('title','Cabang Himpunan')

@section('content')

<div class="box">
  <table class="table table-bordered container">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Nomor Telpon</th>
        <th scope="col">Angkatan</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($admincabang as $admin)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->nomortelfon}}</td>
        <td>{{$admin->angkatan}}</td>
        <td>@if ($admin->status == 1) Aktif @else Tidak Aktif @endif</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<a class="btn btn-success my-2 mx-4 justify-content-end " href="admin/admin/postcabang" role="button"><i class="bi bi-box-arrow-left"></i> Kembali</a>

@endsection