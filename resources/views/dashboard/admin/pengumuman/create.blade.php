@extends('dashboard.admin.main')
@section('title','Tambah Pengumuman')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 border-bottom">
  <h1 class="h2">Buat Pengumuman</h1>
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
        <form class="form-horizontal" method="POST" action="{{ route('admin.pengumuman.store')}}" enctype="multipart/form-data">
            {{  csrf_field() }}

            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul">
                </div>
            </div>

            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" placeholder="Deskripsi.." name="deskripsi"></textarea>
                </div>
            </div>

            <div class="position-relative">
                <button type="submit" class="btn btn-primary position-absolute top-50 end-0 translate-middle-y mt-2">Submit</button>
            </div>
        </form>
    </div>


@endsection