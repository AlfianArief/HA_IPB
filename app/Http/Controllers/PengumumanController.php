<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Cabang;
use App\Models\UserCabang;
use App\Models\Admin;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarpengumuman = Pengumuman::all();
        $datacabang = Cabang::all()->count();
        $dataanggota = UserCabang::count('id_users');
        //return $daftarpengumuman;
        return view('dashboard.admin.dashboard', compact('daftarpengumuman','datacabang','dataanggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.pengumuman.create');
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
            'judul' => 'required|unique:pengumumans|max:255',
            'deskripsi' => 'required',
        ]);

        Pengumuman::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'admin_id' => auth()->user()->id
        ]);
        // add message success, 1:11:37
        return redirect()->route('admin.pengumuman.index')->with('success', 'Grup telah dibuat');
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
        $editpengumuman = Pengumuman::where('id', $id)->get();
        return view('dashboard.admin.pengumuman.edit', compact('editpengumuman'));
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
        $dp = Pengumuman::where('id', $id);
        $dp->delete();

        return redirect()->back()->with('success','Grup telah dihapus');
    }
}
