@extends('dashboard.user.main')
@section('title','Request Pindah Cabang')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 border-bottom">
  <h1 class="h2">Form Request</h1>
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
        <form class="form-horizontal" method="POST" action="{{ route('user.formrequests') }}" enctype="multipart/form-data">
            {{  csrf_field() }}

            <div class="form-group row">
                <label for="pindah_cabang" class="col-sm-2 col-form-label">Ingin pindah cabang kemana?
                </label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" placeholder="*Contoh : Ingin pindah ke cabang Bandung" name="pindah_cabang"></textarea>
                </div>
            </div>

            
            <button type="submit" class="btn btn-success float-right">Kirim</button>

            <a class="btn btn-primary mx-2 float-right" href="{{ route('user.index')}}" role="button"><i class="bi bi-box-arrow-left"></i> Kembali</a>
        </form>
    </div>


@endsection