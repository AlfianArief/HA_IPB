<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCabang;
use App\Models\Cabang;
use App\Models\User;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function history()
    {
        $historyanggota = UserCabang::where('usercabangs.id_users', Auth::user()->id)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')
                    ->join('cabangs','usercabangs.id_cabang','=','cabangs.id')

                    ->select('usercabangs.id', 'usercabangs.created_at', 'users.name','usercabangs.id_cabang', 'usercabangs.status','cabangs.judul',
                    'users.email')->orderBy('usercabangs.created_at', 'DESC')->get();
        
        $listpengumuman = Pengumuman::all();
        //return $listpengumuman;

        return view('dashboard.user.dashboard', compact('historyanggota','listpengumuman'));
    }
}
