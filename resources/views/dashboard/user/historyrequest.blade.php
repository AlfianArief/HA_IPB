@extends('dashboard.user.main')
@section('title','History Request')

@section('content')

    <div class="box">
        <table class="table table-bordered container">
            <thead >
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Terakhir di update</th>
                    <th scope="col">Isi Request</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($history as $h)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$h->updated_at}}</td>
                    <td>{{$h->pindah_cabang}}</td>
                            
                    @if ($h->status == 'APPROVE')
                        <td class="p-3 border bg-success text-center" >{{ $h->status }}</td>
                    @elseif ($h->status == 'REJECTED')
                        <td class="p-3 border bg-danger text-center">{{ $h->status }}</td>
                    @else
                        <td class="p-3 border bg-warning text-center">{{ $h->status }}</td>
                    
                    @endif
                </tr>  
            </tbody>
            @endforeach
        </table>
    </div>
@endsection



             

              
           
          
            

             
     