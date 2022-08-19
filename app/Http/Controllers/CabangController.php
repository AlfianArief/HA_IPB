<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Admin;
use App\Models\UserCabang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $daftar_cabang = Cabang::all();
        return view('dashboard.admin.postcabang.index', compact('daftar_cabang'));
           //->with('cabangs', Cabang::orderBy('updated_at','DESC')->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.postcabang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|unique:cabangs|max:255',
            'ketua' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);

        Cabang::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'ketua' => $request->input('ketua'),
            'alamat' => $request->input('alamat'),
            'admin_id' => auth()->user()->id
        ]);
        // add message success, 1:11:37
        return redirect()->route('admin.postcabang.index')->with('success', 'Grup telah dibuat'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftarcabang = Cabang::where('id', $id)->get();
            

        //$listcabang = DB::table('usercabangs')->join('cabangs','usercabangs.id_cabang','=','cabangs.id')
                    //->where('id_cabang', $id)->first();
                    
        $anggotacabang = UserCabang::where('id_cabang', $id)->count();
      
        return view('dashboard.admin.postcabang.show', compact('daftarcabang', 'anggotacabang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editcabang = Cabang::where('id', $id)->get();
        return view('dashboard.admin.postcabang.edit', compact('editcabang'));
      
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
        $request->validate([
            'judul' => 'required',
            'ketua' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);
        
        
        Cabang::where('id', $id)
            ->update([
                'judul' => $request->input('judul'),
                'ketua' => $request->input('ketua'),
                'alamat' => $request->input('alamat'),
                'deskripsi' => $request->input('deskripsi'),
                'admin_id' => auth()->user()->id,
            ]);
      
        return redirect('admin/admin/postcabang')->with('status', 'Cabang telah diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabang = Cabang::where('id', $id);
        $cabang->delete();

        return redirect()->back()->with('success','Grup telah dihapus');
    }
}
