@extends('dashboard.admin.main')
@section('title','Buat Cabang')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 border-bottom">
  <h1 class="h2">Buat Cabang</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('admin.postcabang.store')}}" enctype="multipart/form-data">
            {{  csrf_field() }}

            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul">
                </div>
            </div>

            <div class="form-group row">
                <label for="ketua" class="col-sm-2 col-form-label">Ketua</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ketua" placeholder="Nama ketua cabang" name="ketua">
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat.." name="alamat">
                </div>
            </div>

            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" placeholder="Deskripsi.." name="deskripsi"></textarea>
                </div>
            </div>

        
            <button type="submit" class="btn btn-primary float-right mt-2">Simpan</button>
      

            <a class="btn btn-success my-2 mx-2 float-right" href="admin/admin/postcabang" role="button">Kembali</a>
        </form>
    </div>


@endsection