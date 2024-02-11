<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use id;
use App\Models\User;
use App\Models\M_Saldo;
use App\Models\DriverProfil;
use App\Models\PenumpangProfil;
use App\Models\TopupSaldo;
use App\Models\TotalSaldo;
use App\Models\Trip;
use App\Models\Kendaraan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Toastr;

class UserController extends Controller
{
    public function halamanuser(){
        $akun = User::get();
  
        $profild = DriverProfil::first();
        $kendaraan = Kendaraan::get();
      
        return view('admin.pages.pengguna',compact('akun','profild','kendaraan' ));
    }

    public function detailuser(Request $request, $id){
        // return "tes";
        $akun = User::where('id', $id)->first();
        $profild = DriverProfil::where('drivers_id', $akun->id)->first();
        $kendaraan = Kendaraan::get();
        $totalsaldo = TotalSaldo::where('users_id', $id)->first();
        $konfirmasitopup = TopupSaldo::where('users_id', $id)->get();
        return view('admin.pages.detailuser',compact('konfirmasitopup','totalsaldo','akun','profild','kendaraan'));
    }

    public function halamanlogin(){
        return view('admin.pages.login');
    }
    
    public function tambahprofilpenumpang(Request $request){
        $tambah_profilp= new PenumpangProfil();
        $tambah_profilp->users_id = Auth::user()->id;
        $profilpenumpangs_id = DB::getPdo()->lastInsertId();    
        if($request->file('foto_profil')){
            $foto_profil= $request->file('foto_profil');
            $filename= 'PenumpangProfil_'.$penumpang_id.'.'. $foto_profil->getClientOriginalName();
            $foto_profil->move(public_path('inputan/img/profilp'), $filename);
            $tambah_profilp->foto_profil= $filename;
        }
    
        if($request->file('identitas')){
            $identitas= $request->file('identitas');
            $filename= 'PenumpangProfil_'.$penumpang_id.'.'. $identitas->getClientOriginalName();
            $identitas->move(public_path('inputan/img/profilp'), $filename);
            $tambah_profilp->identitas= $filename;
        }
        $tambah_profilp->save();
      
        return redirect()->back()->with('success');  
    }   

    public function konfirmasitopup(Request $request, $id){
        $Topup = TopupSaldo::where('users_id', $id)->first();
      
        $Topup->Update([
            'status_top_up' => "Konfirmasi"
        ]);
        
        $Total = TotalSaldo :: where('users_id', $id)->first();  
            $m_saldo = M_Saldo::first();
        
        
        
        $keseluruhan = $Topup->jumlah_saldo_inputan + $Total -> jumlah_saldo_sekarang;
        $Total ->update(['jumlah_saldo_sekarang' => $keseluruhan]);
        
      
        $Topup->delete(); // Menghapus record dengan menggunakan metode delete()

       
             if($Total->jumlah_saldo_sekarang >= $m_saldo->nominal || $Total->jumlah_saldo_sekarang == $m_saldo->nominal ){
            User::where('id', $id)->update([
                'status' => 'Aktif',
            ]);
        }

       

       
        return redirect()->back()->with('success'); 
    }

    
    public function tambahprofildriver(Request $request){
        $tambah_profild= new DriverProfil ();
        $tambah_profild->users_id = Auth::user()->id;
        $tambah_profild->kendaraans_id = $request->kendaraans_id;
      
        $tambah_profild->no_plat = $request->no_plat; 
     
        if($request->file('ktp')){
            $ktp= $request->file('ktp');
            $filename= 'DriverProfil_'.Auth::user()->id .'.'. $ktp->getClientOriginalName();
            $ktp->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->ktp= $filename;
        }
     
        if($request->file('sim')){
            $sim= $request->file('sim');
            $filename= 'DriverProfil_'.Auth::user()->id.'.'. $sim->getClientOriginalName();
            $sim->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->sim= $filename;
        }
        if($request->file('stnk')){
            $stnk= $request->file('stnk');
            $filename= 'DriverProfil_'.Auth::user()->id .'.'. $stnk->getClientOriginalName();
            $stnk->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->stnk= $filename;
        }
        if($request->file('fotokendaraan1')){
            $fotokendaraan1= $request->file('fotokendaraan1');
            $filename= 'DriverProfil_'.Auth::user()->id.'.'. $fotokendaraan1->getClientOriginalName();
            $fotokendaraan1->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->fotokendaraan1= $filename;
        }
        if($request->file('fotokendaraan2')){
            $fotokendaraan2= $request->file('fotokendaraan2');
            $filename= 'DriverProfil_'.Auth::user()->id.'.'. $fotokendaraan2->getClientOriginalName();
            $fotokendaraan2->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->fotokendaraan2= $filename;
        }
        if($request->file('fotokendaraan3')){
            $fotokendaraan3= $request->file('fotokendaraan3');
            $filename= 'DriverProfil_'.Auth::user()->id .'.'. $fotokendaraan3->getClientOriginalName();
            $fotokendaraan3->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->fotokendaraan3= $filename;
        }
        if($request->file('fotokendaraan4')){
            $fotokendaraan4= $request->file('fotokendaraan4');
            $filename= 'DriverProfil_'.Auth::user()->id.'.'. $fotokendaraan4->getClientOriginalName();
            $fotokendaraan4->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->fotokendaraan4= $filename;
        }
        if($request->file('fotokendaraan5')){
            $fotokendaraan5= $request->file('fotokendaraan5');
            $filename= 'DriverProfil_'.Auth::user()->id .'.'. $fotokendaraan5->getClientOriginalName();
            $fotokendaraan5->move(public_path('inputan/img/profild'), $filename);
            $tambah_profild->fotokendaraan5= $filename;
        }
 
        $driverprofils_id = DB::getPdo()->lastInsertId();
       
       
        $tambah_profild->save();
      
        return redirect()->back()->with('success');  
    }
    public function tambahakun(Request $request){
        $tambah_akun= new User ();
        $tambah_akun->name = $request->name; 
        $tambah_akun->email= $request->email; 
        $tambah_akun->password = Hash::make($request->password); 
        $tambah_akun->no_hp = $request->no_hp; 
        $tambah_akun->role = $request->role; 
        $tambah_akun->save();
        $akun_id = DB::getPdo()->lastInsertId();
        if ($tambah_akun->role == "Driver"){
            DriverProfil::create([
                'drivers_id'=>$akun_id
            ]);
    
           TotalSaldo::create([
                'users_id'=>$akun_id
            ]);
        }
        elseif ($tambah_akun->role == "Penumpang"){
            PenumpangProfil::create([
                'users_id'=>$akun_id
            ]);
        }
        return redirect()->back()->with('success');  
    }
    public function editakun(Request $request, $id){
        $edit_akun= User::find ($id);
        $edit_akun->name = $request->name; 
        $edit_akun->email= $request->email; 
        $edit_akun->password = Hash::make($request->password); 
        $edit_akun->no_hp = $request->no_hp; 
        $edit_akun->role = $request->role; 
      
     
        $akun_id = DB::getPdo()->lastInsertId();
       
        $edit_akun->save();
      
        return redirect()->back()->with('success');  
    }
    public function verifikasiakun(Request $request, $id){
        $verifikasi_akun= User::find ($id);
        $verifikasi_akun->status = $request->status; 
        $akun_id = DB::getPdo()->lastInsertId();
       
        $verifikasi_akun->save();
      
        return redirect()->back()->with('success');  
    }
    public function destroy(User $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    } 

    public function cek_login(request $request ){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email Harus Diisi !',
            'email.email' => 'Email tidak valid !',
            'password' => 'Password harus diisi !'
        ]);
        if (!$validate->passes()) return response()->json([
            'status' => 0,
            'msg' => 'Email atau password anda salah !',
        ]);
        if(Auth::attempt($request->only('email','password'))){ 
            if (auth()->user()->role == 'Admin') {
                
                $targetTime = Trip::get();
                $currentDateTime = \Carbon\Carbon::now()->format('Y-m-d H-i-s');
                
            
                $Time = \Carbon\Carbon::now();
                foreach($targetTime as $item){
                    $tgl= \Carbon\Carbon::parse($item->jam_keberangkatan)->subHours(5);
                    if($item->tanggal == $currentDateTime   || $item->tanggal<= $currentDateTime)
                    {
                         if($Time > $tgl){
                           
                            Trip::where('id',  $item->id)->update([
                                'status_trip' => 'Tidak Berlaku',
                            ]);
                         }       
                    }
                    
                }
                // return redirect()->route('index');
                return response()->json([
                    'status' => 1,
                    'msg' => 'Login Berhasil',
                    'route'=>route('index')
                ]);
                
            } else {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Login Gagal',
                ]);
            }
            // elseif (auth()->user()->role == '') {
                    
            //     return redirect()->route('HalamanLogin');
            // }
          
            
                }else{
                return response()->json([
                    'status' => 0,
                    'msg' => 'Login Gagal',
                ]);
        }
        }
    public function user_logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
