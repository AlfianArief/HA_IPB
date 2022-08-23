@extends('dashboard.admin.main')
@section('title','Dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-4 border-bottom">
  <h2 class="h2">Dashboard</h2>
</div>

<div class="card mx-4" style="max-width: 90%;">
  <h5 class="card-header fw-bold">Informasi Cabang</h5>
  <div class="card-body">
    <div class="container overflow-hidden text-center">
      <div class="row gx-5">

   
        <div class="col">
          <div class="p-3 border bg-light">Cabang <i class="nav-icon fas fa-layer-group mx-1"></i><br>
          Total cabang : {{ $datacabang }} 
        </div>
        </div>
        <div class="col">
          <div class="p-3 border bg-light">Anggota<i class="nav-icon fas fa-users mx-1"></i><br>
          Total anggota aktif : {{ $dataanggota }}
        </div>
        </div>
      </div>
    </div>
  </div>
</div>


<a class="btn btn-primary mb-2 mx-4 mt-3 justify-content-end " href="{{ route('admin.pengumuman.create')}}" role="button"><i class="fa fa-plus" aria-hidden="true"></i>Pengumuman</a>


@foreach ($daftarpengumuman as $dp)
<div class="card mx-4" style="max-width: 90%;">
  <h5 class="card-header fw-bold">Pengumuman</h5>
  <form method="POST" action="admin/pengumuman/{{$dp->id}}">
    @csrf
    @method ('delete')

    <button class="btn btn-danger rounded mx-2" type="delete">Hapus</button>
  </form>
  <div class="card-body">
    <div class="container overflow-hidden">
      <div class="row gx-5">
        <h2 class="card-title fw-bold">{{ $dp->judul }}</h2>
        <h6 class="card-subtitle mb-2 text-muted">{{ $dp->updated_at }}</h6>
        <p class="card-text">{{ $dp->deskripsi }}</p>
      </div>
      <form method="GET" action="admin/pengumuman/{{ $dp->id }}/edit">
        @csrf
        <button class="btn btn-success rounded d-flex flex-row-reverse" type="submit">Edit</button>
      </form>
    </div>
  </div>
</div>
@endforeach

@endsection



