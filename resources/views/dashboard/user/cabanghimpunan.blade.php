@extends('dashboard.user.main')
@section('title','Cabang Himpunan')

@section('content')

<div class="box border-bottom">
  <table class="table table-striped container">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Nomor Telpon</th>
        <th scope="col">Angkatan</th>
        <th scope="col">Status Anggota</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($usercabang as $user)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->nomortelfon}}</td>
        <td>{{$user->angkatan}}</td>
        <td>@if ($user->status == 1) Aktif @else Tidak Aktif @endif</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<a class="btn btn-success my-2 mx-4" href="{{ route('user.index')}}" role="button"> Kembali</a>

@endsection