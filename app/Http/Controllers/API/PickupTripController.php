<?php

namespace App\Http\Controllers\API;
use App\Models\Pickuptrip;
use App\Models\RequestPickup;
use App\Models\PickupTripPenumpang;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ApiPTripRequest;
use App\Http\Requests\APIPickupTtipPenumpang;
use App\Http\Requests\ApiPembatalanPickupRequest;
use App\Http\Resources\PickupTripResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\PickTripPenumpang;
class PickupTripController extends Controller
{
    public function showpickuptrip(){
        $pickuptrip = Pickuptrip::get();
        return response()->json([
            'pickup_trips'=>$pickuptrip
        ]);
    }
    public function showpickuptrippenumpang(){
        $pickuptripp = PickupTripPenumpang::get();
        return response()->json([
            'pickup_trip_penumpangs'=>$pickuptripp
        ]);
    }

    public function tambahptrip(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|bigInteger|max:255',
            'pickup_tarifs_id' => 'required|bigInteger|email|max:255|unique:users',
            'waktu' => 'required|string|min:55',
           
            'tanggal' => 'required|date|max:55',
            'jam_keberangkatan' => 'required|time|max:55',
            'kapasitas' => 'required|integer|max:55',
            'status_trip' => 'required|string|max:255',
            'note' => 'required|string|max:55',
            'catatan_lokasi' => 'required|string|max:255',
        ]);
        
            $trip=Pickuptrip::create([
                'users_id' => $request->users_id,
                'pickup_tarifs_id' =>$request->pickup_tarifs_id,
                'tanggal' =>  $request->tanggal,
                'waktu' => $request->waktu,
                'jam_keberangkatan' => $request->jam_keberangkatan,
                 'catatan_trip' => $request->catatan_lokasi,
                'status_trip' => "Menunggu",
                'note' => $request->note,
                'kapasitas' => $request->kapasitas
            ]);
         
          return response()
            ->json(['sukses.', new PickupTripResource($trip) ]);
        }

    public function tambahpickuptrippenumpang(Request $request){
        $validator = Validator::make($request->all(),[
                'users_id' => 'required|Integer|max:255',
                'pickup_trips_id' => 'required|Integer|max:255',
                'jenis_motor_id' => 'required|Integer|max:255',
                'note_lokasi_jemput' => 'required|longText|min:255',
                'catatan_antar' => 'required|longText|max:55',
                'slot' => 'required|integer|max:255',
                'total'=> 'required|double|max:255',
                'status'=> 'required|string|max:255'
            ]);
            
            
            if($request->hasfile('foto')){
                $foto= $request->file('foto');
                $fotod = $foto->getClientOriginalName();
                $foto->move(public_path('inputan/img/pickup/FotoBarangBawaan'), $fotod);
            }
            
            $trip_penumpang = PickupTripPenumpang::create([
                'users_id' => $request->users_id,
                 'pickup_trips_id' =>$request->pickup_trips_id,
                'jenis_motor_id' =>$request->jenis_motor_id,
                'note_lokasi_jemput' => $request->note_lokasi_jemput,
                'catatan_antar' => $request->catatan_antar,
                'foto' => $fotod??$request->foto,
                'slot' => $request->slot??$request->slot,
                'total'=>$total->total??$request->total,
                'status' => "Tunggu Konfirmasi",
            ]);
            // if($request->file('f_barang')){
            //     $f_barang= $request->file('f_barang');
            //     $f_barangd = 'TripPenumpang_-'. $f_barang->getClientOriginalName();
            //     $f_barang->move(public_path('inputan/img/inputan/img/trip_pickup/f_barang'), $f_barangd);
            // }

            // $trip_id = DB::getPdo()->lastInsertId();
            //  if ($request->lokasi_penjemputan != NULL){
            // $request_trip = RequestPickup ::create([
            //     'pickup_trip_penumpang_id'=>$trip_id,
            //     'tarif_rute_id' => $request->tarif_rute_id,
            //     'lokasi_penjemputan' => $request->lokasi_penjemputan,
            //     'barang_bawaan' => $request->barang_bawaan,
            //     // 'f_barang' => $f_barangd,
            //     'status_request' => 'Tunggu Konfirmasi',

            
            // ]); 
            // }
            
            //  $sub_total = $request->pickup_trips_id->pickup_trip->pickuptarif->tarif_per_barang + $request->jenis_motor_id-> tarif_per_motor;
            //  $total = $sub_total * $request->slot;

            // $akun_id = DB::getPdo()->lastInsertId();
            // $trip_penumpangs= PickTripPenumpang::where('id' ,$akun_id)->first()->update([
            //     'total' => $total
            // ]);

            return response()
            ->json(['sukses.', new PickTripPenumpang($trip_penumpang) ]);
    }

    public function pembatalanpickup(Request $request, $id){
        $validator = Validator::make($request->all(),[
            // 'users_id'=> 'required|bigInteger|max:255',
            // 'trips_id' => 'required|bigInteger|max:255|unique:users',
            'alasan_pembatalan_id' => 'required|integer|max:255',
            // 'status_trip'  => 'required|string|max:20',
            'alasan_lainnya' => 'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $batal = PickupTripPenumpang::find($id);
        dd($batal);

        // $batal->users_id = $request->input('users_id'); 
        // $batal->trips_id= $request->input('trips_id');
        $batal->alasan_pembatalan_id = $request->input('alasan_pembatalan_id'); 
        $batal->status_trip = "Trip Batal";
        $batal->alasan_lainnya = $request->alasan_lainnya;
 
        $batal->update();  

        return response()
        ->json(['sukses.', new PickupTripResource($batal) ]);            
    }
    
    public function pembatalanppenumpang(Request $request, $id)  {
        $validator = Validator::make($request->all(),[
            // 'users_id'=> 'required|bigInteger|max:255',
            // 'trips_id' => 'required|bigInteger|max:255|unique:users',
            'alasan_pembatalan_id' => 'required|integer|max:255',
            'status'  => 'required|string|max:20',
            'alasan_lainnya' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $batal = PickupTripPenumpang::find($id);
       
        // $batal->users_id = $request->input('users_id'); 
        // $batal->trips_id= $request->input('trips_id');
        $batal->alasan_pembatalan_id = $request->input('alasan_pembatalan_id'); 
        $batal->status = "Trip Dibatalkan";
        $batal->alasan_lainnya = $request->alasan_lainnya;
 
        $batal->update();  

        return response()
    ->json(['sukses.', new PickupTripResource($batal) ]);            
    }

    public function acc_p_request(Request $request, $id){
        $acc_request = RequestPickup ::find($id);
        $acc_request->status_request = $request->status_request;   
        $acc_request->update();  

        return response()
        ->json(['sukses.', new PickTripPenumpang($acc_request) ]); 

    }
    public function acctolakpenumpangpickup(Request $request, $id)  {
        $validator = Validator::make($request->all(),[
            'status'  => 'required|string|max:20',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $batal = PickupTripPenumpang::find($id);
    
        $batal->status = $request->status;
        $batal->update();  

        return response()
        ->json(['sukses.', new PickupTripResource($batal) ]);            
    }
    public function gantistatuspickup(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'status_trip'  => 'required|string|max:20',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $batal = Pickuptrip::find($id);
        $batal->status_trip = $request->status_trip;
        $batal->update();  

        return response()
        ->json(['sukses.', new PickupTripResource($batal) ]);            
    }
    
    public function gantistatuspickuppenumpang(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'status'  => 'required|string|max:20',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $batal = PickupTripPenumpang::find($id);
        $batal->status = $request->status;
        $batal->update();  

        return response()
        ->json(['sukses.', new PickupTripResource($batal) ]);            
    }
    
    public function reviewpickup(Request $request, $id){
        // $validator = Validator::make($request->all(),[
        //     // 'users_id'=> 'required|bigInteger|max:255',
        //     // 'trips_id' => 'required|bigInteger|max:255|unique:users',
         
        //     // 'rating'  => 'required|integer|max:20',
    
        // ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors());       
        // }
    
        $reviewp = PickupTripPenumpang::find($id);
        $reviewp->review = $request->review;
        $reviewp->rating = $request->rating;
        $reviewp->update();

        return response()
        ->json(['sukses.', new ReviewResource($reviewp) ]); 


    } 



}
