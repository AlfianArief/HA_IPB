@extends('dashboard.admin.main')
@section('title','Cabang Himpunan')

@section('content')

<h1 class="mb-4 mx-4">Cabang Himpunan</h1>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif


  <a class="btn btn-primary mb-2 mx-4 justify-content-end " href="{{ route('admin.postcabang.create')}}" role="button"><i class="fa fa-plus" aria-hidden="true"> Cabang</a></i>


@foreach ($daftar_cabang as $cabang)

  <div class="card mt-2 mx-4" style="width: 95%;">
    <div class="card-body">
      <h5 class="card-title fw-bold">{{ $cabang->judul }}</h5>
      <p class="card-text">Ketua cabang : {{ $cabang->ketua }}</p>
      <p class="card-text">Alamat : {{ $cabang->alamat }}</p>
      <p class="card-text">{{ $cabang->deskripsi }}</p>
      <div class="d-flex flex-row-reverse">
          <form method="POST" action="admin/admincabanghimpunan/{{ $cabang->id }}">
            @csrf
                <button class="btn btn-primary rounded mx-2" type="submit">Masuk</button>
          </form>

          <form method="GET" action="admin/admin/postcabang/{{ $cabang->id }}/edit">
            @csrf
                <button class="btn btn-success rounded mx-2" type="submit">Edit</button>
          </form>

          <form method="GET" action="admin/admin/postcabang/{{ $cabang->id }}">
            @csrf
                <button class="btn btn-secondary rounded mx-2" type="submit">Detail</button>
          </form>

          <form method="POST" action="admin/admin/postcabang/{{$cabang->id}}">
            @csrf
            @method ('delete')

                <button class="btn btn-danger rounded mx-2" type="delete">Non-Aktif</button>
          </form>
        </div>
    </div>
  </div>

@endforeach

@endsection