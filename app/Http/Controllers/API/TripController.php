<?php
namespace App\Http\Controllers\API;
use App\Models\Trip;
use App\Models\RequestTrip;
use App\Models\TripPenumpang;
use App\Models\Posisi_Kursi;
use App\Models\M_Saldo;
use App\Models\User;
use App\Models\K_Saldo;
use App\Models\DriverProfil;
use App\Models\TotalSaldo;
use App\Models\AlasanPembatalan;
use Auth;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ApiTripRequest;
use App\Http\Resources\TripResource;
use App\Http\Resources\PembatalanTripResource;
use App\Http\Resources\TripPenumpangResource;
use App\Http\Resources\ReviewResource;
use App\Http\Requests\ApiTripPRequest;
use App\Http\Requests\ApiPembatalanRequest;
class TripController extends Controller
{
    public function showtrip(){
        $trip = Trip::get();
        return response()->json([
                'trips'=>$trip
        ]);
    }
    public function showtrippenumpang($trips_id){
        $penumpangtrip = TripPenumpang::where('trips_id', $trips_id)->first();
        return response()->json([
                'trip_penumpangs'=>$penumpangtrip
        ]);
    }
    public function trippenumpangall(){
        $penumpangtrip = TripPenumpang::get();
        return response()->json([
                'trip_penumpangs'=>$penumpangtrip
        ]);
    }
    // public function tambahtrippenumpang(ApiTripRequest $request, $id){
    //     $valid = $request->validated();
    //     // $this->registerValidation($request->all());
    //     DB::beginTransaction();
    //     try{

    //         if($request->file('foto_barangb')){
    //             $bukti_barang= $request->file('foto_barangb');
    //             $filename= 'TripPenumpang-'. $bukti_barang->getClientOriginalName();
    //             $bukti_barang->move(public_path('inputan/img/trip_penumpang'), $filename);
    //         }
       
    //         // $trip_penumpang = TripPenumpang::where('id',$id)->update([
    //         //     // users_id
    //         //     // trips_id
    //         //     // catatan_lokasi
    //         //     // kursi
    //         //     // foto_barangb
    //         //     // barang_b
    //         //     'users_id' => trim($valid['users_id']),
    //         //     'trips_id' => trim($valid['trips_id']),
    //         //     'catatan_lokasi' => trim($valid['catatan_lokasi']),
    //         //     'barangb' => trim($valid['barangb']),
    //         //     'foto_barangb' => trim($valid['foto_barangb']),
    //         //     'posisi_kursi' => trim($valid['posisi_kursi']),

    //         // ]);

    //         $request = RequestTrip::where('trip_penumpangs_id', $id)->first()->update([
    //             'users_id' => trim($valid['users_id']),
    //             'trip_penumpangs_id' => trim($valid['trip_penumpangs_id']),
    //             'trips_id' => trim($valid['trips_id']),
    //             'tarif_rute_id' => trim($valid['tarif_rute_id']),
    //             'lokasi_penjeputan' => trim($valid['lokasi_penjemputan']),
    //             'barang_bawaan' => trim($valid['barang_bawaan']),
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
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
      
            'tarifs_id' => 'required|integer',
            'waktu' => 'required|string|min:5',
            'tanggal' => 'required|date',
    
            'kapasitas' => 'required|integer',
            'status_trip' => 'required|string',
            'catatan' => 'required|string|max:255',
            'catatan_lokasi' => 'required|string|max:255',
        ]);

        $trip=Trip::create([
            'users_id' => $request->user_id,
            'kendaraans_id' =>$request->kendaraans_id,
            'tarifs_id' => $request->tarifs_id,
            'tanggal' =>  $request->tanggal,
            'waktu' => $request->waktu,
            'jam_keberangkatan' => $request->jam_keberangkatan,
             'catatan_lokasi' => $request->catatan_lokasi,
            'status_trip' => "Menunggu Driver",
            'catatan' => $request->catatan
        ]);
    
        $trip_id = DB::getPdo()->lastInsertId();
        
        $posisi = DB::getPdo()->lastInsertId();
        $posisi_kursi = Posisi_kursi::create([
            'trips_id'=>$posisi,
            'no_kursi1' => $request->no_kursi1,
            'no_kursi2' => $request->no_kursi2,
            'no_kursi3' => $request->no_kursi3,
           
        ]);
    
        $k_saldo = K_Saldo::first();
        $m_saldo = M_Saldo::first();
       
        $totalsaldo = TotalSaldo::where('users_id',$trip->users_id)->first();
  
      
        $kk_saldo = $totalsaldo->jumlah_saldo_sekarang - $k_saldo->nominal;
      
        $totalsaldo->update([
            'jumlah_saldo_sekarang' => $kk_saldo,
        ]);

        $driver=User::where('id',$trip->users_id)->first();
       
        
        if($totalsaldo->jumlah_saldo_sekarang <= $m_saldo->nominal){
            User::where('id', $driver->id)->update([
                'status' => 'Tidak Aktif',
            ]);
            
        }

        // $k_saldo = K_Saldo::first();        
        
        //  $trip_id = DB::getPdo()->lastInsertId();
        // $request_trip = Request::create([
        //   'trips_id'=>$trip_id
           
        //  ]);
        return response()
        ->json(['sukses.', new TripResource($trip) ]);
    }


    public function trippenumpang(Request $request){
            $validator = Validator::make($request->all(), [
                'users_id' => 'required|bigInteger|max:255',
                'trips_id' => 'required|bigInteger|email|max:255|unique:users',
                'catatan_lokasi' => 'required|longText|min:255',
                'barangb' => 'required|longText|max:55',
                'posisi_kursi' => 'required|integer|max:55',
                'harga_tarif' => 'required|string|max:255',
                'tarifs_id' => 'required|string|max:255',
            ]);

            // if($request->file('foto_barangb')){
            //     $foto_barangb= $request->file('foto_barangb');
            //     $foto_barangbd = 'TripPenumpang_-'. $foto_barangb->getClientOriginalName();
            //     $foto_barangb->move(public_path('inputan/img/inputan/img/trip/foto_barangb'), $foto_barangbd);
            // }
            if ($request->hasFile('foto_barangb')) {
            $file = $request->file('foto_barangb');
            $uploadDir = 'inputan/img/fotobarangpesan';
            $NamaBarang = $file->getClientOriginalName();
            $file->move($uploadDir, $NamaBarang);
        }
            $trip_penumpang = TripPenumpang::create([
                'users_id' => $request->users_id,
                'trips_id' =>$request->trips_id,
                'catatan_lokasi' => $request->catatan_lokasi,
                'tarifs_id'=> $request->tarifs_id,
                'barangb' => $request->barangb,
                'foto_barangb' => $NamaBarang,
                'posisi_kursi' => $request->posisi_kursi,
                'harga_tarif' =>  $request->harga_tarif,
                'status' =>  $request->status,
            ]);
            
            $trip_id = DB::getPdo()->lastInsertId();
            // if($request->file('f_barang')){
            //     $f_barang= $request->file('f_barang');
            //     $f_barangd = 'TripPenumpang_-'. $f_barang->getClientOriginalName();
            //     $f_barang->move(public_path('inputan/img/inputan/img/trip/f_barang'), $f_barangd);
            // }
            
            if ($request->r_lokasi_penjemputan != NULL){

            $request_trip = RequestTrip ::create([
                'trip_penumpangs_id'=>$trip_id,
                'tarif_rute_id' => $request->tarif_rute_id,
                'lokasi_penjemputan' => $request->rlokasi_penjemputan,
                'barang_bawaan' => $request->rbarang_bawaan,
                'f_barang' => $request->foto_barangb,
                'status_request' => 'Tunggu Konfirmasi',
            
            ]);
            }

 
            return response()
            ->json(['sukses.', new TripPenumpangResource($trip_penumpang) ]);
        }


        
    
    public function pembatalan(Request $request, $id){
        $validator = Validator::make($request->all(),[
            // 'users_id'=> 'required|bigInteger|max:255',
            // 'trips_id' => 'required|bigInteger|max:255|unique:users',
            'alasan_pembatalan_id' => 'required|integer|max:255',
            // 'status_trip'  => 'required|string|max:20',
            'alasan_lainnya' => 'requir ed|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        dd($request->alasan_pembatalan_id);
        $batal = Trip::find($id);
        // $batal->users_id = $request->input('users_id'); 
        // $batal->trips_id= $request->input('trips_id');
        $batal->alasan_pembatalan_id = $request->input('alasan_pembatalan_id'); 
        $batal->status_trip = "Trip Batal";
        $batal->alasan_lainnya = $request->alasan_lainnya;
 
        $batal->update();  

        return response()
        ->json(['sukses.', new TripResource($batal) ]);
    }
    
    public function pembatalanpenumpang(Request $request, $id)  {
        $validator =  Validator::make($request->all(),[
            // 'users_id'=> 'required|bigInteger|max:255',
            // 'trips_id' => 'required|bigInteger|max:255|unique:users',
            'alasan_pembatalan_id' => 'required|integer|max:255',
            // 'status'  => 'required|string|max:20',
            'alasan_lainnya' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $batal = TripPenumpang::find($id);
       
        // $batal->users_id = $request->input('users_id'); 
        // $batal->trips_id= $request->input('trips_id');

        // $batal->alasan_id = $request->alasan_id; 
       $batal->alasan_pembatalan_id = $request->alasan_pembatalan_id; 
        $batal->status = "Dibatalkan";
        $batal->alasan_lainnya = $request->alasan_lainnya;
 
        $batal->update();  
           return response()
        ->json(['sukses.', new TripResource($batal) ]);            
    }
    
    public function postinganselesai(Request $request, $id){
        $validator = Validator::make($request->all(),[
            // 'users_id'=> 'required|bigInteger|max:255',
            // 'trips_id' => 'required|bigInteger|max:255|unique:users',
            // 'alasan_pembatalan_id' => 'required|integer|max:255',
            'status_trip'  => 'required|string|max:20',
            // 'alasan_lainnya' => 'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $TripSelesai = Trip::find($id);
        // $batal->users_id = $request->input('users_id'); 
        // $batal->trips_id= $request->input('trips_id');
        // $batal->alasan_pembatalan_id = $request->input('alasan_pembatalan_id'); 
        $TripSelesai->status_trip = "Trip Selesai";
        // $batal->alasan_lainnya = $request->alasan_lainnya;
 
        $TripSelesai->update();  

        return response()
        ->json(['sukses.', new TripResource($TripSelesai) ]);
    }
    
    public function GantiSetatus(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'status_trip'  => 'required|string|max:20',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $TripSelesai = Trip::find($id);
        $TripSelesai->status_trip = $request->status_trip;
 
        $TripSelesai->update();  

        return response()
        ->json(['sukses.', new TripResource($TripSelesai) ]);
    }

    public function acc_request(Request $request, $id){
         $acc_request = TripPenumpang::find($id);
       
        $acc_request->status = $request->status;   
        $acc_request->update();  

        return response()
        ->json(['sukses.', new TripPenumpangResource($acc_request) ]); 

    }
    public function review(Request $request, $id){
        $validator = Validator::make($request->all(),[
            // 'users_id'=> 'required|bigInteger|max:255',
            // 'trips_id' => 'required|bigInteger|max:255|unique:users',
            'review' => 'required|string|max:255',
            // 'rating'  => 'required|integer|max:20',
    
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $review = TripPenumpang::find($id);
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->update();

        return response()
        ->json(['sukses.', new ReviewResource($review) ]); 


    } 
}
