@extends('dashboard.admin.main')
@section('title','Mutasi Anggota')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 border-bottom">
  <h1 class="h2">Mutasi Anggota</h1>
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

@foreach ($editanggota as $edit)

    <div class="card-body">
        <form class="form-horizontal" method="POST" action=" admin/mutasi/{{ $edit->id }}"  enctype="multipart/form-data">
        @csrf
        @method ('PUT')

       
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="judul" placeholder="Nama" name="name" value="{{ $edit->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="ketua" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="ketua" placeholder="Email" name="email" value="{{ $edit->email }}" >
                </div>
            </div>

            <div class="form-group row">
                <label for="editcabang" class="col-sm-2 col-form-label">Cabang</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="cabang" id="inputcabang">
                        <option selected value="{{ $edit->id_cabang }}">{{ $edit->judul }}</option>
                            @foreach ($listcabang as $list)
                                @if ($list->judul != $edit->judul)
                                    <option value="{{ $list->id }}">{{ $list->judul }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
            
            <a class="btn btn-secondary mx-2 float-right" href="{{ route('admin.list') }}" role="button"> Kembali</a>
        </form>
    </div>
    @endforeach


@endsection