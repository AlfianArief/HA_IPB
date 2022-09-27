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
use App\Models\Job;
use App\Models\Organization;
use App\Http\Controllers\User\UserCabang;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;    


class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user_id =  Auth::user()->id;
        $education = Education::where('user_id', $user_id)->first();
        $job = Job::where('user_id', $user_id)->first();
        $org = Organization::where('user_id', $user_id)->first();
        return view('dashboard.user.profile', compact('education','job','org'));
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

        $education = new Education();
        $education->user_id = $user->id;
        $save1 = $education->save();

        $job = new Job();
        $job->user_id = $user->id;
        $save2 = $job->save();

        $org = new Organization();
        $org->user_id = $user->id;
        $save3 = $org->save();

        if( $save && $save1 && $save2 && $save3){
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
            return redirect()->route('user.login')->with('fail','Password Salah');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function showforgotform()
    {
        return view('dashboard.user.forgot.forgotform');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);

        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('user.resetpasswordform',['token'=>$token, 'email'=>$request->email]);
        $body = "We are received a request to reset the password <b>HA IPB</b> account associated with ".$request->email.". You can reset your password by clicking the link below:";

        \Mail::send('email-forgot', ['action_link'=>$action_link,'body'=>$body], function($message) use($request){
            $message->from('noreply@example.com','HA IPB');
            $message->to($request->email,'Your Name')
                    ->subject('Reset Password');
        });

        return back()->with('success', 'Link untuk reset password telah dikirim ke email!');

    }

    public function showresetform(Request $request, $token = null)
    {
        return view('dashboard.user.forgot.reset')->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function resetpassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:6',
            'cpassword'=>'required|same:password',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'invalid token');
        } else {
            User::where('email', $request->email)->update([
                'password'=> \Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('user.login')->with('info', 'Password anda telah direset! Silahkan login menggunakan password baru');
        }
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

    public function changePicture(Request $request)
    {
        
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

    

        return redirect()->back()->with('status','Profil sudah di perbaharui');
        
    }

    public function organizationupdate(Request $request)
    {
        $user_id =  Auth::user()->id;
        Organization::where('user_id', $user_id)
                ->update([
                    'organisasi' => $request->input('organisasi'),
                    'jabatan' => $request->input('jabatan'),
                    'tanggal_masuk' => $request->input('tanggal_masuk'),
                ]);


        return redirect()->back()->with('status','Profil sudah di perbaharui');
    }

    public function jobupdate(Request $request)
    {
        $user_id =  Auth::user()->id;
        Job::where('user_id', $user_id)
                ->update([
                    'pekerjaan' => $request->input('pekerjaan'),
                    'nama_p' => $request->input('nama_p'),
                    'alamat_p' => $request->input('alamat_p'),
                    'jabatan' => $request->input('jabatan'),
                    'produk' => $request->input('produk'),
                ]);


        return redirect()->back()->with('status','Profil sudah di perbaharui');
    }

}
