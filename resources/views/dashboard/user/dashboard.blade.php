@extends('dashboard.user.main')
@section('title','Dashboard Anggota')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mx-4 pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard Anggota</h1>
</div>

<!-- Informasi Cabang -->
<div class="card mx-4" style="max-width: 90%;">
  <h5 class="card-header fw-bold">Informasi Cabang</h5>
  <div class="card-body">
    <div class="container overflow-hidden">
    @if (count($historyanggota)=== 0) Belum terdaftar di cabang manapun @else
    @foreach ($historyanggota as $ha)
      <div class="col">
        <div class="p-3"> @if($ha->status == 1)Cabang Aktif @else <hr>Cabang lama @endif
          <i class="nav-icon fas fa-layer-group mx-1"></i><br>
          Tanggal join : {{ $ha->created_at }} <br>
          Cabang : {{ $ha->judul }} 
        </div>
      </div>
   @endforeach
   @endif 
    </div>
  </div>
</div>



<!-- Pengumuman -->
<div class="card mx-4" style="max-width: 90%">
  <h5 class="card-header fw-bold">Pengumuman</h5>
  <div class="card-body">
  @foreach ($listpengumuman as $lp)
    <div class="container overflow-hidden">
      <h2 class="card-title fw-bold">{{ $lp->judul }}</h2>
      <p class="card-text text-muted">{{ $lp->updated_at }}</p>
      <p class="card-text border-bottom">{{ $lp->deskripsi }}</p>
      @endforeach
    </div>
  </div>
</div>

@endsection