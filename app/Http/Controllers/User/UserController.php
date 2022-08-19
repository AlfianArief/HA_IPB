<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use Hash;
use Illuminate\Support\Facades\File;
use App\Models\Education;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user_id =  Auth::user()->id;
        $education = Education::where('user_id', $user_id)->first();
        return view('dashboard.user.profile', compact('education'));
    }


    function create(Request $request)
    {
        //validate input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:6|max:20',
            'cpassword' => 'required|min:6|max:20|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();


        if( $save ){
            return redirect()->route('user.login')->with('success','You are now registered successfully');
        } else{
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    function check(Request $request)
    {
        //validate inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:20'
        ],[
            'email.exists' => 'This email is not exists on user table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function profileupdate(Request $request)
    {

        $user_id = Auth::user()->id;
        $user = User::findorFail($user_id);
        
        $user->name = $request->input('name');
        $user->namalengkap = $request->input('namalengkap');
        $user->email = $request->input('email');
        $user->tempatlahir = $request->input('tempatlahir');
        $user->tanggallahir = $request->input('tanggallahir');
        $user->jeniskelamin = $request->input('jeniskelamin');
        $user->golongandarah = $request->input('golongandarah');
        $user->agama = $request->input('agama');
        $user->alamatktp = $request->input('alamatktp');
        $user->alamatdomisili = $request->input('alamatdomisili');
        $user->hobi = $request->input('hobi');
        $user->nomortelfon = $request->input('nomortelfon');

        $user->update();
        return redirect()->back()->with('status','Profil sudah di perbaharui');
     
    }

    public function changePassword(ChangePasswordRequest $request)
    {

        $oldpassword = auth()->user()->password;
        $user_id = auth()->user()->id;

        if(Hash::check($request->input('oldpassword'), $oldpassword)){
            $user = User::find($user_id);

            $user->password = Hash::make($request->input('newpassword'));

            if($user->save()){
                return redirect()->back()->with('success', 'Ganti password telah berhasil');
            }
        }  else {
            return redirect()->back()->with('failed', 'Password lama tidak valid');
        }
    }

    public function changePicture(Request $request){
        
        $path = 'users/images/';
        $file = $request->file('user_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Upload foto profil gagal.']);
        }else{
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Update foto profile di database gagal.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Foto profil telah diupdate.']);
            }
        }
    }

    public function educationupdate(Request $request)
    {
        $user_id =  Auth::user()->id;
        Education::where('user_id', $user_id)
                ->update([
                    'angkatan' => $request->input('angkatan'),
                    'fakultas' => $request->input('fakultas'),
                    'jurusan' => $request->input('jurusan'),
                    'kode_jurusan' => $request->input('kode_jurusan'),
                    'NIM' => $request->input('NIM'),
                ]);

        

        //$education->update();

        return redirect()->back()->with('status','Profil sudah di perbaharui');
        
    }
}
