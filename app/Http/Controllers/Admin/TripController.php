<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Kendaraan;
use App\Models\Tarif;
use App\Models\User;
use App\Models\Trip;
use App\Models\DriverProfil;
use App\Models\AlasanPembatalan;
use App\Models\TripPenumpang;
use App\Models\RequestTrip;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    
    public function halamantrip(){
        $kendaraan = Kendaraan::get();
        $tarif = Tarif::get();
        $akun = User::get();
        $trip = Trip::get();
        $datakendaraan = Kendaraan::get();
        $datatarif = Tarif::get();
        $dataakun = User::get();
        $driver = DriverProfil::get();  
        
        return view('admin.pages.trip', compact('kendaraan','tarif','akun','trip','datakendaraan','datatarif','dataakun','driver'));
    }
    public function halamanriwayattrip(){
  
        $riwayattrip = Trip::get();
        return view('admin.pages.riwayattrip', compact('riwayattrip'));
    }
    public function halamandetailtrip(Request $request, $id){
        $kendaraan = Kendaraan::get();
        $tarif = Tarif::get();
        $akun = User::where('id', $id)->first();
        $trip = Trip::find($id);
        $terip = Trip::get();
        $tripu = Trip::get();
        $alasan = AlasanPembatalan::get();
        $detail_trip = TripPenumpang::where('trips_id', $id)->with('RelasiRequest')->get();
        $request = RequestTrip::where('trips_id', $id)->with('RelasiTripP','RelasiRequest')->get();
        return view('admin.pages.detailtrip', compact('kendaraan','tarif','akun','trip','detail_trip','terip','tripu','alasan','request'));
    }
    public function halamandetailriwayattrip(Request $request, $id){
   
        $akun = User::where('id', $id)->first();
        $trip = Trip::find($id);
        $terip = Trip::get();
        $tripu = Trip::get();
        $detail_trip = TripPenumpang::where('trips_id', $id)->get();
        return view('admin.pages.detailriwayattrip', compact('akun','trip','detail_trip','terip','tripu'));
    }
    
    public function pindahtrip(Request $request, $id){
        $pindah_trip = TripPenumpang::find($id);
        $pindah_trip->trips_id = $request->trips_id; 
        $penumpang_trips_id = DB::getPdo()->lastInsertId(); 
        $pindah_trip->save();
        return redirect()->back()->with('success');  
    }
    public function cancletrip(Request $request, $id){
        $cancle_trip = TripPenumpang::find($id);
        $cancle_trip->status = $request->status; 
        $penumpang_trips_id = DB::getPdo()->lastInsertId(); 
        $cancle_trip->save();
        return redirect()->back()->with('success');  
    }
    
    public function tambahtrip(Request $request){

        $tambah_trip = new Trip();  
        $tambah_trip->users_id = $request->users_id;
        $tambah_trip->kendaraans_id = $request->kendaraans_id;
        $tambah_trip->tarifs_id = $request->tarifs_id;
        $tambah_trip->tanggal = $request->tanggal;
        $tambah_trip->waktu = $request->waktu;
        $tambah_trip->jam_keberangkatan = $request->jam_keberangkatan;
        $tambah_trip->kapasitas = $request->kapasitas;
        $tambah_trip->status_trip = $request->status_trip;
        $tambah_trip->catatan = $request->catatan;

        
        $trips_id = DB::getPdo()->lastInsertId(); 
        $tambah_trip->save();
        return redirect()->back()->with('success');  
        
    }
    public function edittrip(Request $request, $id){

        $edit_trip = Trip::find($id);  
        $edit_trip->users_id = $request->users_id;
        $edit_trip->kendaraans_id = $request->kendaraans_id;
        $edit_trip->tarifs_id = $request->tarifs_id;
        $edit_trip->tanggal = $request->tanggal;
        $edit_trip->waktu = $request->waktu;
        $edit_trip->jam_keberangkatan = $request->jam_keberangkatan;
        $edit_trip->kapasitas = $request->kapasitas;
        $edit_trip->status_trip = $request->status_trip;
        $edit_trip->catatan = $request->catatan;
        $trips_id = DB::getPdo()->lastInsertId(); 
        $edit_trip->save();
        return redirect()->back()->with('success');  
        
    }

    public function destroy(Trip $id)
    {
        TripPenumpang::where('trips_id', $id->id)->delete();
        $id->delete(); 
 
     return redirect()->back()->with('success','Book deleted');
    }

    public function limajam(Request $request){

        // $limajam = Trip::find($id);
        $setTime = Carbon::parse('2023-05-08 10:00:00');

          // Subtract 5 hours from the set time
        $beforeTime = $setTime->subHours(5);


        Trip::where('jam_keberangkatan', '<', $beforeTime)->update([
            'status_trip' => 'Dapat Dihubungi'
        ]);

    }

    
}
