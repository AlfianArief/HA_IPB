<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserCabang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = DB::table('cabangs')->join('admins','cabangs.admin_id','=','admins.id')
            ->select('cabangs.id','cabangs.updated_at','cabangs.judul','cabangs.deskripsi', 'cabangs.ketua', 'cabangs.alamat')->orderby('id','desc')->get();

        $user_id =  Auth::user()->id;          

        $check = DB::table('usercabangs')
            ->where('usercabangs.id_users', $user_id)
            ->get();
        
            if(count($check)){

                $cabang = DB::table('cabangs')
                        ->join('admins','cabangs.admin_id','=','admins.id')
                        ->join('usercabangs', 'cabangs.id', '=', 'usercabangs.id_cabang')
                        ->where('usercabangs.id_users', $user_id)->where('usercabangs.status', 1)
                
                        ->select('cabangs.id','cabangs.updated_at','cabangs.judul','cabangs.deskripsi', 'cabangs.ketua', 'cabangs.alamat', 'usercabangs.status')->orderby('id','desc')->get();    
            }
            
            return view('dashboard.user.cabanguser', compact('cabang'));
            //return $check;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $alreadyJoined = UserCabang::where('id_cabang', $request->id_cabang)->where('id_users', Auth::user()->id)->first();
        
        if (isset($alreadyJoined)) {

            return redirect()->route('user.cabang', $request->id_cabang)->with('success','Selamat anda sudah bergabung di grup himpunan alumni IPB!');
        } else {
            UserCabang::create([
                'id_cabang'=>$request->id_cabang,
                'id_users'=>Auth::user()->id,
            ]);
            return redirect()->route('user.cabang', $request->id_cabang)->with('success','Selamat anda sudah bergabung di grup himpunan alumni IPB!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cabang($id)
    {
        //$usercabang = DB::table('usercabangs')->paginate(5);
        $usercabang = DB::table('usercabangs')->where('usercabangs.id_cabang', $id)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')
                    ->join('educations','users.id','=','educations.user_id')

                    ->select('usercabangs.id', 'usercabangs.created_at','usercabangs.status', 'users.name',
                    'users.email', 'users.nomortelfon','educations.angkatan')->paginate(5);
        
        return view('dashboard.user.cabanghimpunan', compact('usercabang'));

     /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }

    public function admincabang($id)
    {
        $admincabang = DB::table('usercabangs')->where('usercabangs.id_cabang', $id)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')
                    ->join('educations', 'users.id','=','educations.user_id')

                    ->select('usercabangs.id', 'usercabangs.created_at','usercabangs.status', 'users.name',
                    'users.email', 'users.nomortelfon', 'educations.angkatan')->get();
        return view('dashboard.admin.postcabang.admincabanghimpunan', compact('admincabang'));
    }

    public function list()
    {
        $listanggota = DB::table('usercabangs')
                    ->where('usercabangs.status', 1)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')
                    ->join('cabangs','usercabangs.id_cabang','=','cabangs.id')

                    ->select('usercabangs.id', 'usercabangs.created_at', 'users.name', 'cabangs.judul',
                    'users.email')->get();
        return view('dashboard.admin.anggota.list', compact('listanggota'));
    }

    public function mutasi($id)
    {
        $editanggota = UserCabang::where('usercabangs.id', $id)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')
                    ->join('cabangs','usercabangs.id_cabang','=','cabangs.id')

                    ->select('usercabangs.id', 'usercabangs.created_at', 'users.name','usercabangs.id_cabang', 'cabangs.judul',
                    'users.email')->get();

        $listcabang = Cabang::all(); 
        return view('dashboard.admin.anggota.mutasi', compact('editanggota','listcabang'));
    }

    public function updateanggota(Request $request, $id)
    {
        $validated = $request->validate([
            'cabang' => 'required|numeric',
        ]);

        $cabanglama = Usercabang::where('id', $id)
                ->select('status', 1);
                
        $cabanglama->update([
            'status' => false,
        ]);

        UserCabang::create([
            'id_cabang' => $request->input('cabang'),
            'id_users' => $id,
            'aktif' => true,
        ]);

        return redirect()->route('admin.list')->with('success', 'Anggota telah dimutasi');
       
    }
}
