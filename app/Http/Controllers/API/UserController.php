<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\DriverProfil;
use App\Models\TotalSaldo;
use App\Models\TopupSaldo;
use App\Models\Posisi_Kursi;
use App\Models\PenumpangProfil;
use App\Models\Trip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ApiPenumpangProfilRequest;
use App\Http\Requests\APIProfilDriverRequest;
use App\Http\Requests\APIUserRegisterRequest;
use App\Http\Resources\ProfilResource;
use App\Http\Resources\PProfilResource;
use App\Http\Resources\TopupResource;
use App\Http\Resources\DriverProfilResource;
use Auth;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   //all response code is 200, permintaan hutomo


   public function showuser($id){
    $user = User::find($id);
    return response()->json([
        'users'=>$user
    ]);
}
 public function kursi(){
        $kursi = Posisi_Kursi::get();
        return response()->json([
                'kursi'=>$kursi
        ]);
    }
public function userall(){
    $userall = User::get();
    return response()->json([
        'users'=>$userall
    ]);
}
public function showuserdriver($id){
    $userdriver = DriverProfil::where('drivers_id', $id)->first();
    return response()->json([
        'driverprofils'=>$userdriver  
    ]);
}
public function driverall(){
    $userdriver = DriverProfil::get();
    return response()->json([
        'driverprofils'=>$userdriver  
    ]);
}
public function showsaldo($id){
    $saldo = TotalSaldo::where('users_id', $id)->first();
    return response()->json([
        'total_saldos'=>$saldo  
    ]);
}
public function saldoall(){
    $saldo = TotalSaldo::get();
    return response()->json([
        'total_saldos'=>$saldo  
    ]);
}
public function showuserpenumpang(){
    $userpenumpang = PenumpangProfil::get();
    return response()->json([
        'penumpang_profils'=>$userpenumpang
    ]);
}
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Email atau Password Salah silahkan cek kembali'], 401);
        }
     
       
        $user = User::where('email', $request['email'])->firstOrFail();

        // $token = $user->createToken('auth_token')->plainTextToken;
        //    $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
        
        $targetTime = Trip::where('users_id',(auth()->user()->id))->get();
        $currentDateTime = \Carbon\Carbon::now()->format('Y-m-d H-i-s');
        $Time = \Carbon\Carbon::now();
        $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
        foreach($targetTime as $item){ 
            $tgl= \Carbon\Carbon::parse($item->jam_keberangkatan)->subHours(5);
            if($item->tanggal == $currentDateTime   || $item->tanggal<= $currentDateTime  ){
                if($Time > $tgl){
                    Trip::where('id',  $item->id)->update([
                        'status_trip' => 'Tidak Berlaku',
                    ]);
                }
            }
            
        }
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer'], 200);

     
     
      
        // return response()
        //     ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
    }
    
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'no_hp' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role,

         ]);
         
         $akun_id = DB::getPdo()->lastInsertId();
        
                 if ($user->role == "Driver"){
                    User::where('id', $akun_id)->update([
                        'status' => 'Tidak Aktif',
                    ]);
                     DriverProfil::create([
                         'drivers_id'=>$akun_id,
                       
                     ]);    
             
                    TotalSaldo::create([
                         'users_id'=>$akun_id
                     ]);
                 }
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
        ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', $akun_id ]);
    }

    // public function register(ApiUserRegisterRequest $request){
    //     $valid = $request->validated();
    //     // $this->registerValidation($request->all());
    //     DB::beginTransaction();
    //     try  {
 
    //         $user = User::create([
    //             'name' => trim($valid['name']),
    //             'email' => strtolower($valid['email']),
    //             'password' => $valid['password'],
    //             'no_hp' => $valid['no_hp'],
    //             'role' => $valid['role']
                
    //         ]);
    //         $akun_id = DB::getPdo()->lastInsertId();
    //         if ($user->role == "Driver"){
    //             DriverProfil::create([
    //                 'drivers_id'=>$akun_id
    //             ]);
        
    //            TotalSaldo::create([
    //                 'users_id'=>$akun_id
    //             ]);
    //         }
    //         DB::commit();
    //         return response()->json([
    //             'code' => 201,
    //             'message' => 'Berhasil menambahkan pengguna. Silahkan periksa e-mail yang terdaftar untuk aktivasi akun.'
    //         ]);  

    //     }
    //     catch (Exception $e) {
    //         DB::rollback();
    //         return response()->json([
    //             'code' => $e->getCode() ?? 500,
    //             'message' => 'Terjadi kesalahan!. ' . $e->getMessage()
    //         ], 200);
    //  }

    // }
    public function topupsaldo(Request $request){
        $validator = Validator::make($request->all(),[
            'users_id' => 'required|bigInteger|max:255',
            'jumlah_saldo_inputan' => 'required|double|max:55',
            'bukti' => 'required|string|max:255',
            
        ]);
        
        // if($request->hasfile('bukti')){
        //     $bukti= $request->file('bukti');
        //     $path = $image->store('images');
        //     // $PBukti = base64_encode(file_get_contents($request->file('image')));
        //     // $bukti->move(public_path('inputan/img/inputan/img/profild/bukti'), $PBukti);
        // // }
        //         // Path to the image file
        //     $imagePath = public_path('inputan/img/inputan/img/profild/bukti');
        //     // Open the image using Intervention Image
        //     $image = Image::make($imagePath);

        //     // Convert the image to base64 string
        //     $base64String = $image->encode('data-url')->encoded;
        //     $payload = [
        //         'bukti' => $base64String,
        //         // Add other data fields as required
        //     ];
        
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            
            // Tentukan folder tujuan penyimpanan file
            $uploadDir = 'inputan/img/profild/DataTopUp';
            
            // Generate nama file unik untuk mencegah tumpang tindih
            $fileName = 'BuktiTopup_' . $file->getClientOriginalName();
            
            // Pindahkan file ke folder tujuan
            $file->move($uploadDir, $fileName);
            
            // File berhasil diunggah
        } else {
            // File 'ktp' tidak ditemukan dalam data multipart
            return response('File Tidak detemukan.', 400);
        }
        
        $topup=TopupSaldo::create([
            'users_id' => $request->users_id,
            'jumlah_saldo_inputan' => $request->jumlah_saldo_inputan,
            'bukti' => $fileName,
            'tanggal_topup' => $request->tanggal_topup,
            'status_top_up' => "Menunggu Konirmasi",
        ]);
        return response()
        ->json("['sukses.', new TopupResource($topup) ]");

    }
    
    public function editpassword(Request $request,$id)
    {
        $rules = array(
         
            'password' => 'required|min:6',
            
        );
        
        // $input = $request->all();
        // $userid = Auth::guard('api')->user()->id;
        $user = User::find($id);
        $user->password= Hash::make($request->input('password')); 
        $user->update();
        // return \Response::json($arr);
        return response()
        ->json(['password sukses diganti ' ]);
    }
    public function mengeditprofil(Request $request, $id ){
        
        $userId = auth()->id();
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'users_id' => 'required|bigInteger|max:255',
            // 'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|max:255',
            'no_hp' => 'required|string|max:16',
            'foto_profil' => 'required|string|min: 6',
            'ktp' => 'required|string|min: 6',
            'sim' => 'required|string|min: 6',
            'stnk' => 'required|string|unique:users|min: 6',
            'foto_kendaraan1' => 'required|string|min:6',
            'foto_kendaraan2' => 'required|string|min:6',
            'foto_kendaraan3' => 'required|string|min:6',
            'foto_kendaraan4' => 'required|string|min:6',
            'foto_kendaraan5' => 'image|mimes:jpeg,png,jpg|max:4096',
           'tipe_pelayanan' => 'required|string|min:6',
           'no_plat' => 'required|string|max:16',
        ]);
   
        $user = User::find($id);
        $user->name = $request->input('name')?? $user->name; 
        $user->no_hp= $request->input('no_hp')?? $user->no_hp;
        $user->email = $request->input('email')?? $user->email; 
        // $user->password= Hash::make($request->password); 
       
        $user->save();  

        // $user=User::where('id', $id)->first()->update([
        //      'name'=>$request->name,
        //      'no_hp'=>$request->no_hp,
        //      'email'=>$request->email,
        //      'password'=>$request->password,
        //      'role'=>$request->role,
        //  ]);
        
        // $profile = DriverProfil::where('drivers_id', $id)->first() ;
            
        // $profil = DriverProfil::find($profile->drivers_id, $id)->first();
        // dd($profil);
        // $profil->ktp = $request->input('ktp');
        // $profil->kendaraans_id = $request->input('kendaraans_id');
        // $profil->sim = $request->input('sim');
        // $profil->stnk = $request->input('stnk') ;
        // $profil->fotokendaraan1 =$request->input('kendaraan1');
        // $profil->fotokendaraan2 =$request->input('kendaraan2');
        // $profil->fotokendaraan3 =$request->input('kendaraan3');
        // $profil->fotokendaraan4 =$request->input('kendaraan4');
        // $profil->fotokendaraan5 =$request->input('kendaraan5');
        // $profil->tipepelayanan = $request->input('tipepelayanan');
        // $profil->no_plat = $request->input('no_plat');
        // $profil->save();  


        // if($request->file('ktp')){
        //     $ktp= $request->file('ktp');
        //     $KTPD = 'DriverProfil_-'. $ktp->getClientOriginalName();
        //     $ktp->move(public_path('inputan/img/inputan/img/profild/ktp'), $KTPD);
        // }
        // if($request->file('sim')){
        //     $sim= $request->file('sim');
        //     $simd = 'DriverProfil_-'. $sim->getClientOriginalName();
        //     $sim->move(public_path('inputan/img/inputan/img/profild/sim'), $simd);
        // }
        // if($request->file('stnk')){
        //     $stnk= $request->file('stnk');
        //     $stnkd = 'DriverProfil_-'. $stnk->getClientOriginalName();
        //     $stnk->move(public_path('inputan/img/inputan/img/profild/stnk'), $stnkd);
        // }
        // if($request->file('fotokendaraan1')){
        //     $fotokendaraan1= $request->file('fotokendaraan1');
        //     $fotokendaraan1d = 'DriverProfil_-'. $fotokendaraan1->getClientOriginalName();
        //     $fotokendaraan1->move(public_path('inputan/img/inputan/img/profild/fotokendaraan1'), $fotokendaraan1d);
        // }
        // if($request->file('fotokendaraan2')){
        //     $fotokendaraan2= $request->file('fotokendaraan2');
        //     $fotokendaraan2d = 'DriverProfil_-'. $fotokendaraan2->getClientOriginalName();
        //     $fotokendaraan2->move(public_path('inputan/img/inputan/img/profild/fotokendaraan2'), $fotokendaraan2d);
        // }
        // if($request->file('fotokendaraan3')){
        //     $fotokendaraan3= $request->file('fotokendaraan3');
        //     $fotokendaraan3d = 'DriverProfil_-'. $fotokendaraan3->getClientOriginalName();
        //     $fotokendaraan3->move(public_path('inputan/img/inputan/img/profild/fotokendaraan3'), $fotokendaraan3d);
        // }
        // if($request->file('fotokendaraan4')){
        //     $fotokendaraan4= $request->file('fotokendaraan4');
        //     $fotokendaraan4d = 'DriverProfil_-'. $fotokendaraan4->getClientOriginalName();
        //     $fotokendaraan4->move(public_path('inputan/img/inputan/img/profild/fotokendaraan4'), $fotokendaraan4d);
        // }
        // if($request->file('fotokendaraan5')){
        //     $fotokendaraan5= $request->file('fotokendaraan5');
        //     $fotokendaraan5d = 'DriverProfil_-'. $fotokendaraan5->getClientOriginalName();
        //     $fotokendaraan5->move(public_path('inputan/img/inputan/img/profild/fotokendaraan5'), $fotokendaraan5d);
        // }
        
         
         
    //   $driverprofil= DriverProfil::where('drivers_id' ,$id )->first()->update([
    //         'ktp' => $KTPD,
    //         // 'drivers_id' => $request->input('drivers_id'),
    //         'kendaraans_id' => $request->input('kendaraans_id'),
    //         'sim' => $simd,
    //         'stnk' => $stnkd,
    //         'fotokendaraan1' => $fotokendaraan1d,
    //         'fotokendaraan2' => $fotokendaraan2d,
    //         'fotokendaraan3' => $fotokendaraan3d,
    //         'fotokendaraan4' => $fotokendaraan4d,
    //         'fotokendaraan5' => $fotokendaraan5d,
    //         'tipepelayanan' => $request->input('tipepelayanan'),
    //         'no_plat' =>$request->input('no_plat'),
            
    //     ]);
    
    
    $driverprofil = DriverProfil::where('drivers_id', $user->id)->first();
        if($request->file('foto_profil')){
            $fotoProfil= $request->file('foto_profil');
            $fotoProfilD = 'DriverProfil_-'. $fotoProfil->getClientOriginalName();
            $fotoProfil->move(public_path('inputan/img/profild/foto_profil'), $fotoProfilD);  
        } else {
        // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
        $fotoProfilD = $driverprofil->foto_profil;
        }
        if($request->file('ktp')){
            $ktp= $request->file('ktp');
            $KTPD = 'DriverProfil_-'. $ktp->getClientOriginalName();
            $ktp->move(public_path('inputan/img/profild/fotoktp'), $KTPD);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $KTPD = $driverprofil->ktp;
            }
        if($request->file('sim')){
            $sim= $request->file('sim');
            $simd = 'DriverProfil_-'. $sim->getClientOriginalName();
            $sim->move(public_path('inputan/img/profild/fotosim'), $simd);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $simd = $driverprofil->sim;
            }
        if($request->file('stnk')){
            $stnk= $request->file('stnk');
            $stnkd = 'DriverProfil_-'. $stnk->getClientOriginalName();
            $stnk->move(public_path('inputan/img/profild/fotostnk'), $stnkd);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $stnkd = $driverprofil->stnk;
            }
        if($request->file('fotokendaraan1')){
            $fotokendaraan1= $request->file('fotokendaraan1');
            $fotokendaraan1d = 'DriverProfil_-'. $fotokendaraan1->getClientOriginalName();
            $fotokendaraan1->move(public_path('inputan/img/profild/fotokendaraan'), $fotokendaraan1d);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $fotokendaraan1d = $driverprofil->fotokendaraan1;
            }
        if($request->file('fotokendaraan2')){
            $fotokendaraan2= $request->file('fotokendaraan2');
            $fotokendaraan2d = 'DriverProfil_-'. $fotokendaraan2->getClientOriginalName();
            $fotokendaraan2->move(public_path('inputan/img/profild/fotokendaraan'), $fotokendaraan2d);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $fotokendaraan2d = $driverprofil->fotokendaraan2;
            }
        if($request->file('fotokendaraan3')){
            $fotokendaraan3= $request->file('fotokendaraan3');
            $fotokendaraan3d = 'DriverProfil_-'. $fotokendaraan3->getClientOriginalName();
            $fotokendaraan3->move(public_path('inputan/img/profild/fotokendaraan'), $fotokendaraan3d);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $fotokendaraan3d= $driverprofil->fotokendaraan3;
            }
        if($request->file('fotokendaraan4')){
            $fotokendaraan4= $request->file('fotokendaraan4');
            $fotokendaraan4d = 'DriverProfil_-'. $fotokendaraan4->getClientOriginalName();
            $fotokendaraan4->move(public_path('inputan/img/profild/fotokendaraan'), $fotokendaraan4d);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $fotokendaraan4d= $driverprofil->fotokendaraan4;
            }
        if($request->file('fotokendaraan5')){
            $fotokendaraan5= $request->file('fotokendaraan5');
            $fotokendaraan5d = 'DriverProfil_-'. $fotokendaraan5->getClientOriginalName();
            $fotokendaraan5->move(public_path('inputan/img/profild/fotokendaraan'), $fotokendaraan5d);
        }else {
            // Jika tidak ada perubahan, tetap gunakan gambar yang sudah ada
            $fotokendaraan5d= $driverprofil->fotokendaraan5;
            }   

        $driverprofil->foto_profil =$fotoProfilD;
        $driverprofil->ktp = $KTPD;                       
        $driverprofil->kendaraans_id = $request->input('kendaraans_id');
        $driverprofil->sim = $simd;
        $driverprofil->stnk = $stnkd;
        $driverprofil->fotokendaraan1 = $fotokendaraan1d; 
        $driverprofil->fotokendaraan2 = $fotokendaraan2d; 
        $driverprofil->fotokendaraan3 = $fotokendaraan3d; 
        $driverprofil->fotokendaraan4 = $fotokendaraan4d; 
        $driverprofil->fotokendaraan5 = $fotokendaraan5d; 
        $driverprofil->tipepelayanan = $request->input('tipepelayanan');
        $driverprofil->no_plat = $request->input('no_plat');
        $driverprofil->save();

        return response()
        ->json(['sukses.', new ProfilResource($user), new DriverProfilResource($driverprofil) ]);

    }

    public function mengeditprofilp(Request $request ,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'users_id' => 'required|bigInteger|max:255',
            'email' => 'required|email|unique:users|max:255',
            'identitas' => 'image|mimes:jpeg,png,jpg|max:4096',
            'gambarprofil' => 'image|mimes:jpeg,png,jpg|max:4096',
            // 'password' => 'required|string|max:255',
         
        ]);
        
    
        if ($request->hasFile('identitas')) {
            $file = $request->file('identitas');
            // Tentukan folder tujuan penyimpanan file
            $uploadDir = 'inputan/img/profilp/identitas';
            // Generate nama file unik untuk mencegah tumpang tindih
            $identitasName = $file->getClientOriginalName();
            // Pindahkan file ke folder tujuan
            $file->move($uploadDir, $identitasName);
            // File berhasil diunggah
        }
    
         if ($request->hasFile('gambarprofil')) {
            $file = $request->file('gambarprofil');
            // Tentukan folder tujuan penyimpanan file
            $uploadDir = 'inputan/img/profilp/foto_profil';
            // Generate nama file unik untuk mencegah tumpang tindih
            $fotoprofileName = $file->getClientOriginalName();
            // Pindahkan file ke folder tujuan
            $file->move($uploadDir, $fotoprofileName);
            
            // File berhasil diunggah
        }
        $user = User::find($id);
        $user->name = $request->input('name'); 
        $user->no_hp= $request->input('no_hp');
        $user->email = $request->input('email');
        $user->identitas = $identitasName ?? $user->identitas;
        $user->gambarprofil = $fotoprofileName ?? $user->gambarprofil;
        // $user->password= Hash::make($request->input('password')); 
        
        $user->save(); 
        return response()
        ->json(['sukses.', new PProfilResource($user) ]);

       
    }   

   
}
