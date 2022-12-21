@extends('dashboard.admin.main')
@section('title','List Request')

@section('content')

<div class="box">
  <table class="table table-bordered container">
    <thead >
      <tr class="text-center">
        <th scope="col">No</th>

        <th scope="col">Nama</th>
        <th scope="col">Isi Request</th>
        <th scope="col" >Aksi</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($checkrequest as $check)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$check->name}}</td>
        <td>{{$check->pindah_cabang}}</td>
        <td>
          <div class="container overflow-hidden text-center justify-content-center">
            <div class="row gx-5">
              <div class="col-6">
                <form action="admin/approve/{{ $check->id }}" method="post">
                  @csrf
                  @method ('put')

                  <button class="btn btn-success px-6" type=submit @if ($check->status != 'PENDING') disabled @endif>Aprroved</button>
                </form>
              </div>
              
              <div class="col-6">
                <form action="admin/reject/{{ $check->id }}" method="post">
                  @csrf
                  @method('put')

                  <button class="btn btn-danger" type=submit @if($check->status!= 'PENDING') disabled @endif>Rejected</button>
                </form>
              </div>
            </div>
          </div>
        </td>
        @if ($check->status == 'APPROVE')
          <td class="p-3 border bg-success text-center" >{{ $check->status }}</td>
        @elseif ($check->status == 'REJECTED')
          <td class="p-3 border bg-danger text-center">{{ $check->status }}</td>
        @else
          <td class="p-3 border bg-warning text-center">{{ $check->status }}</td>
        @endif
        </div>
        
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<a class="btn btn-primary my-2 mx-4" href="{{  route('admin.list') }}" role="button"><i class="bi bi-box-arrow-left"></i> Kembali</a>

@endsection



             

              
           
          
            

             
     