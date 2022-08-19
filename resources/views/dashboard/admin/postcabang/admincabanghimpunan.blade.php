@extends('dashboard.admin.main')
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
    @foreach ($admincabang as $admin)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$admin->created_at}}</td>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->id}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection