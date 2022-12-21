<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FormRequest;
use Illuminate\Support\Facades\DB;

class FormRequestController extends Controller
{
    public function showformrequests()
    {
        return view('dashboard.user.requestform');
    }

    public function formrequests(Request $request)
    {
        $validated = $request->validate([
            'pindah_cabang' => 'required',
        ]);

        FormRequest::create([
            'pindah_cabang' => $request->input('pindah_cabang'),
            'id_users' => auth()->user()->id,
        ]);

        return redirect()->route('user.index')->with('success', 'Form request berhasil dikirim');
    }


    public function checkrequests($id)
    {
        $checkrequest = DB::table('formrequests')
                    ->where('id_users', $id)
                    ->join('users','formrequests.id_users','=','users.id')
                    ->select('formrequests.id','formrequests.pindah_cabang','users.name', 'formrequests.status', 'formrequests.id_users')->get();


        return view('dashboard.admin.anggota.listrequest', compact('checkrequest'));
    }

    public function approverequests($id)
    { 
        FormRequest::where('id', $id)->update([
            'status' => 'APPROVE',
        ]);

        $listanggota = DB::table('usercabangs')
                    ->where('usercabangs.status', 1)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')
                    ->join('cabangs','usercabangs.id_cabang','=','cabangs.id')
                    ->select('usercabangs.id', 'usercabangs.id_users', 'usercabangs.created_at', 'users.name', 'cabangs.judul',
                    'users.email')->get();
        
        return view('dashboard.admin.anggota.list', compact('listanggota'), ['success'=>'Permintaan pindah cabang telah diterima']);
    }

    public function rejectrequests($id)
    {
        FormRequest::where('id', $id)->update([
            'status' => 'REJECTED',
        ]);

        $listanggota = DB::table('usercabangs')
                    ->where('usercabangs.status', 1)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')
                    ->join('cabangs','usercabangs.id_cabang','=','cabangs.id')
                    ->select('usercabangs.id', 'usercabangs.id_users', 'usercabangs.created_at', 'users.name', 'cabangs.judul',
                    'users.email')->get();
        
        return view('dashboard.admin.anggota.list', compact('listanggota'), ['fail'=>'Permintaan pindah cabang telah diterima']);
    }

    public function historyrequests()
    {
        $history = DB::table('formrequests')
        ->select('formrequests.id','formrequests.pindah_cabang', 
        'formrequests.status', 'formrequests.id_users','formrequests.updated_at')->get();

        return view('dashboard.user.historyrequest', compact('history'));
    }
}
