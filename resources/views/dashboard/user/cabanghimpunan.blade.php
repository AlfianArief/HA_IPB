@extends('dashboard.user.main')
@section('title','Cabang Himpunan')

@section('content')

<div class="box">
  <table class="table table-striped container">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal join</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">ID</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($usercabang as $user)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$user->created_at}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->id}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection