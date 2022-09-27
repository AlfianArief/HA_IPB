@extends('dashboard.user.main')
@section('title','Cabang Himpunan')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 border-bottom">
  <h3 class="mb-2 mx-4">Daftar Seluruh Cabang Himpunan Alumni IPB</h3>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif



  @foreach ($cabang as $listcabang) 
    <div class="card mt-2 mx-4" style="width: 95%;">
      <div class="card-body">
        <b><h5 class="card-title fw-bold">{{ $listcabang->judul }}</b></h5>
        <p class="card-text">{{ $listcabang->ketua }}</p>
        <p class="card-text">{{ $listcabang->alamat }}</p>
        <p class="card-text">{{ $listcabang->deskripsi }}</p>
        <div class="d-flex flex-row-reverse container">
        <form method="POST" action="{{route('user.store')}}">
            @csrf
                <button class="btn btn-primary rounded" type="submit">Masuk</button>
                <div class="form-group">
                     <input type="hidden" name="id_cabang" value=" {{ $listcabang->id }} ">
                </div>
          </form>
        </div>
    </div>
  </div>
  @endforeach

@endsection
