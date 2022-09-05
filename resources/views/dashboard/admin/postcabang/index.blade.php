@extends('dashboard.admin.main')
@section('title','Cabang Himpunan')

@section('content')

<h1 class="mb-4 mx-4">Cabang Himpunan</h1>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif


  <a class="btn btn-success mb-2 mx-4 justify-content-end " href="{{ route('admin.postcabang.create')}}" role="button"><i class="fa fa-plus" aria-hidden="true"> Cabang</a></i>


@foreach ($daftar_cabang as $cabang)

  <div class="card mt-2 mx-4" style="width: 95%;">
    <div class="card-body">
      <h5 class="card-title fw-bold">{{ $cabang->judul }}</h5>
      <p class="card-text">Ketua cabang : {{ $cabang->ketua }}</p>
      <p class="card-text">Alamat : {{ $cabang->alamat }}</p>
      <p class="card-text">{{ $cabang->deskripsi }}</p>

          <form method="POST" action="admin/admincabanghimpunan/{{ $cabang->id }}">
            @csrf
                <button class="btn btn-primary rounded mx-2 float-right" type="submit"><i class="bi bi-box-arrow-in-right"></i> Masuk</button>
          </form>

          <form method="GET" action="admin/admin/postcabang/{{ $cabang->id }}/edit">
            @csrf
                <button class="btn btn-warning rounded mx-2 float-right" type="submit"><i class="bi bi-pencil-square"></i> Edit</button>
          </form>

          <form method="GET" action="admin/admin/postcabang/{{ $cabang->id }}">
            @csrf
                <button class="btn btn-secondary rounded mx-2 float-right" type="submit"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</button>
          </form>

          
        </div>
    </div>

    
@endforeach

@endsection