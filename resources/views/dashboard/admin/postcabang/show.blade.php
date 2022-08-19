@extends('dashboard.admin.main')
@section('title','Cabang Himpunan')

@section('content')

<div class="box">
  <table class="table table-striped container">
    <thead>
      <tr>
        <th scope="col">judul</th>
        <th scope="col">ketua</th>
        <th scope="col">alamat</th>
        <th scope="col">deskripsi</th>
        <th scope="col">Jumlah anggota</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($daftarcabang as $cabang)
      <tr>
        <td>{{$cabang->judul}}</td>
        <td>{{$cabang->ketua}}</td>
        <td>{{$cabang->alamat}}</td>
        <td>{{$cabang->deskripsi}}</td>
        <td>{{ $anggotacabang }}</td>
      </tr>
      @endforeach

     

    </tbody> 
  </table>
</div>

@endsection