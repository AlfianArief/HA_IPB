@extends('dashboard.admin.main')
@section('title','Dashboard Admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-4 border-bottom">
  <h2 class="h2">Dashboard</h2>
</div>

<h3 class="mx-4">Data Cabang & Anggota</h3>


<div class="row mx-3 border-bottom">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ $datacabang }}</h3>

        <p>Cabang</p>
      </div>
      <div class="icon">
        <i class="nav-icon fas fa-layer-group mx-1"></i>
      </div>
        
      </div>
    </div>
          
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $dataanggota }} </h3>

          <p>Anggota Aktif</p>
        </div>
        <div class="icon">
          <i class="nav-icon fas fa-users mx-1"></i>
        </div>
          
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

  <a class="btn btn-success mb-2 mx-4 mt-3 justify-content-end " href="{{ route('admin.pengumuman.create')}}" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Pengumuman</a>

  @foreach ($daftarpengumuman as $dp)
  <div class="card mx-4" style="max-width: 90%;">
    <h5 class="card-header fw-bold">Pengumuman</h5>
    <div class="card-body">
      <div class="container overflow-hidden">
        <div class="card-body">
          <div class="container overflow-hidden">
            <div class="row gx-5">
            <h2 class="card-title fw-bold">{{ $dp->judul }}</h2>
            <h6 class="card-subtitle mb-2 text-muted">{{ $dp->updated_at }}</h6>
            <p class="card-text">{{ $dp->deskripsi }}</p>
            </div>
          </div>
        </div>
      </div>
      <form method="GET" action=" admin/pengumuman/{{ $dp->id }}/edit">
        @csrf

        <button class="btn btn-warning rounded mx-2 float-right" type="submit"><i class="bi bi-pencil-square"></i> Edit</button>
      </form>
      <form method="POST" action="admin/pengumuman/{{ $dp->id }}">
        @csrf
        @method ('delete')

        <button class="btn btn-danger rounded mx-2 float-right" type="delete"><i class="bi bi-trash"></i> Hapus</button>
      </form>
    </div>
  </div>
@endforeach

@endsection



