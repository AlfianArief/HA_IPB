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
            ->where('usercabangs.id_users', $user_id)->get();
        
            if(count($check)){

            $cabang = DB::table('cabangs')->join('admins','cabangs.admin_id','=','admins.id')->join('usercabangs', 'cabangs.id', '=', 'usercabangs.id_cabang')
                ->where('usercabangs.id_users', $user_id)
                ->select('cabangs.id','cabangs.updated_at','cabangs.judul','cabangs.deskripsi', 'cabangs.ketua', 'cabangs.alamat')->orderby('id','desc')->get();             
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

        $usercabang = DB::table('usercabangs')->where('usercabangs.id_cabang', $id)
                    ->join('users', 'usercabangs.id_users', '=', 'users.id')

                    ->select('usercabangs.id', 'usercabangs.created_at', 'users.name',
                    'users.email')->get();
        
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

                    ->select('usercabangs.id', 'usercabangs.created_at', 'users.name',
                    'users.email')->get();
        return view('dashboard.admin.postcabang.admincabanghimpunan', compact('admincabang'));
    }

}
