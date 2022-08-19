@extends('dashboard.admin.main')
@section('title','Create Group')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 border-bottom">
  <h1 class="h2">Edit Cabang</h1>
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

@foreach ($editcabang as $edit)

    <div class="card-body">
        <form class="form-horizontal" method="POST" action="admin/admin/postcabang/{{ $edit->id }}"  enctype="multipart/form-data">
        @csrf
        @method ('PUT')

       
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{ $edit->judul }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="ketua" class="col-sm-2 col-form-label">Ketua</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ketua" placeholder="Nama ketua cabang" name="ketua" value="{{ $edit->ketua }}" >
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat.." name="alamat" value="{{ $edit->alamat }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" placeholder="Deskripsi.." name="deskripsi">{{ $edit->deskripsi }}"</textarea>
                </div>
            </div>

            <div class="position-relative">
                <button type="submit" class="btn btn-primary position-absolute top-50 end-0 translate-middle-y mt-2">Simpan</button>
            </div>
        </form>
    </div>
    @endforeach


@endsection