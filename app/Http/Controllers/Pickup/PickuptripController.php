<?php

namespace App\Http\Controllers\Pickup;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\JenisMotor;
use App\Models\TarifPickup;
use App\Models\User;
use App\Models\Pickuptrip;
use App\Models\PickupTripPenumpang;
use App\Models\DriverProfil;
use App\Models\TripPenumpang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class PickuptripController extends Controller
{
    public function halamanpickuptrip(Request $request){
        $jenismotor   = JenisMotor::get();
        $tarifpickup = TarifPickup::get();
        $akun = User::get();
        $trippickup = Pickuptrip::get();
        $datajenismotor = JenisMotor::get();
        $datatarif = TarifPickup::get();
        $dataakun = User::get();
        $driver = DriverProfil::get();  
        
        return view('admin.pages.trippickup', compact('jenismotor','tarifpickup','akun','trippickup','datajenismotor','datatarif','dataakun','driver'));
    }
    public function halamanriwayatpickuptrip(){
  
        $riwayatpickuptrip = Pickuptrip::get();
        return view('admin.pages.riwayatpickuptrip', compact('riwayatpickuptrip'));
    }
    public function hdriwayatpickuptrip(Request $request, $id){
   
        $akun = User::where('id', $id)->first();
        $trip = Pickuptrip::find($id);
        $terip = Pickuptrip::get();
        $tripu = Pickuptrip::get();
        $detail_trip = PickupTripPenumpang::where('pickup_trips_id', $id)->get();
        return view('admin.pages.detailriwayatpickuptrip', compact('akun','trip','detail_trip','terip','tripu'));
    }
    public function halamandetailpickuptrip(Request $request, $id){
        $jenismotor = JenisMotor::get();
        $tarifpickup = TarifPickup::get();
        $akun = User::where('id', $id)->first();
        $trippickup = Pickuptrip::find($id);
        $terip = Pickuptrip::get();
        $tripu = Pickuptrip::get();
        
        $detail_trip = PickupTripPenumpang::where('pickup_trips_id', $id)->get();
        return view('admin.pages.detailtrippickup', compact('jenismotor','tarifpickup','akun','trippickup','detail_trip','terip','tripu'));
    }
    public function tambahpickuptrip(Request $request){

        $tambah_pickup_trip = new Pickuptrip();  
        $tambah_pickup_trip->users_id = $request->users_id;
        $tambah_pickup_trip->jenis_motor_id = $request->jenis_motor_id;
        $tambah_pickup_trip->pickup_tarifs_id = $request->pickup_tarifs_id;
        $tambah_pickup_trip->tanggal = $request->tanggal;
        $tambah_pickup_trip->waktu = $request->waktu;
        $tambah_pickup_trip->jam_keberangkatan = $request->jam_keberangkatan;
        $tambah_pickup_trip->note = $request->note;
        $tambah_pickup_trip->kapasitas = $request->kapasitas;
        $tambah_pickup_trip->status_trip = $request->status_trip;

        $pickup_trips_id = DB::getPdo()->lastInsertId(); 
        $tambah_pickup_trip->save();

        
        return redirect()->back()->with('success');  
        
    }
    
    public function editpickuptrip(Request $request, $id){

        $edit_pickup_trip = Pickuptrip::find($id);  
        $edit_pickup_trip->users_id = $request->users_id;
        $edit_pickup_trip->jenis_motor_id = $request->jenis_motor_id;
        $edit_pickup_trip->pickup_tarifs_id = $request->pickup_tarifs_id;
        $edit_pickup_trip->tanggal = $request->tanggal;
        $edit_pickup_trip->waktu = $request->waktu;
        $edit_pickup_trip->jam_keberangkatan = $request->jam_keberangkatan;
        $edit_pickup_trip->note = $request->note;
        $edit_pickup_trip->kapasitas = $request->kapasitas;
        $edit_pickup_trip->status_trip = $request->status_trip;
        $pickup_trips_id = DB::getPdo()->lastInsertId(); 
        $edit_pickup_trip->save();
        return redirect()->back()->with('success');   
    }
    public function pindahpickuptrip(Request $request, $id){
        $pindah_trip = PickupTripPenumpang::find($id);
        $pindah_trip->pickup_trips_id = $request->pickup_trips_id; 
        $pickup_trip_penumpang_id = DB::getPdo()->lastInsertId(); 
        $pindah_trip->save();
        return redirect()->back()->with('success');  
    }
    public function canclepickuptrip(Request $request, $id){
        $cancle_trip = PickupTripPenumpang::find($id);
        $cancle_trip->status = $request->status; 
        $penumpang_trips_id = DB::getPdo()->lastInsertId(); 
        $cancle_trip->save();
        return redirect()->back()->with('success');  
    }
    public function destroy(Pickuptrip $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    } 

}
