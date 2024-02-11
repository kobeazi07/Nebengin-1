<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class VehicleController extends Controller
{
    public function halamankendaraan(){
        $kendaraan = Kendaraan::get();
        return view('admin.pages.tipekendaraan',compact('kendaraan'));
    }
    public function tambahkendaraan(Request $request){
        $tambah_kendaraan = new Kendaraan();  
   
        $tambah_kendaraan->nama_tipe  = $request->nama_tipe;
      
        $tambah_kendaraan->jumlah_kursi = $request->jumlah_kursi;
        // $tambah_kendaraan->tipe_layanan = $request->tipe_layanan;

     
       $kendaraans_id = DB::getPdo()->lastInsertId(); 
       if($request->file('gambardenah')){
        $gambardenah= $request->file('gambardenah');
        $filename= 'Kendaraan_'.$kendaraans_id .'.'. $gambardenah->getClientOriginalName();
        $gambardenah->move(public_path('inputan/img/kendaraan'), $filename);
        $tambah_kendaraan->gambardenah= $filename;
    }
       $tambah_kendaraan->save();
       return redirect()->back()->with('success');  
    }
    public function editkendaraan(Request $request, $id){
        $edit_kendaraan = Kendaraan::find($id);  
   
        $edit_kendaraan->nama_tipe  = $request->nama_tipe;
      
        $edit_kendaraan->jumlah_kursi = $request->jumlah_kursi;
        // $edit_kendaraan->tipe_layanan = $request->tipe_layanan;

     
       $kendaraans_id = DB::getPdo()->lastInsertId(); 
       if($request->file('gambardenah')){
        $gambardenah= $request->file('gambardenah');
        $filename= 'Kendaraan_'.$kendaraans_id .'.'. $gambardenah->getClientOriginalName();
        $gambardenah->move(public_path('inputan/img/kendaraan'), $filename);
        $edit_kendaraan->gambardenah= $filename;
    }
       $edit_kendaraan->save();
       return redirect()->back()->with('success');  
    }
    
    public function destroy(Kendaraan $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    }

    
}
