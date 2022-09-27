@extends('dashboard.admin.main')
@section('title','Cabang Himpunan')

@section('content')


  @foreach ($daftarcabang as $cabang)
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Judul</td>
                  <td>{{$cabang->judul}}</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Ketua</td>
                  <td>{{$cabang->ketua}}</td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Alamat</td>
                  <td>{{$cabang->alamat}}</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Deskripsi</td>
                  <td>{{$cabang->deskripsi}}</td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Jumlah Anggota</td>
                  <td>{{ $anggotacabang }}</td>
                </tr>
              </tbody>
            </table>
          </div>
       
    <a class="btn btn-success my-2 mx-4 float-right" href="admin/admin/postcabang" role="button">Kembali</a>
  @endforeach






@endsection