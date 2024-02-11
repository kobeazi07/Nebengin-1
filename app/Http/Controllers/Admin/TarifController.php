<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Kendaraan;
use App\Models\Tarif;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class TarifController extends Controller
{
    public function halamantarif(Request $request){
        $kendaraan = Kendaraan::get();
        $rute = Rute::get();
        $datarute = Rute::get();
        $tarif = Tarif::get();
        $datakendaraan = Kendaraan::get();
        return view('admin.pages.datatarif', 
        compact('datakendaraan','datarute','kendaraan','rute','tarif'));
    }
    public function tambahtarif(Request $request){
        $tambah_tarif= new Tarif ();
        $tambah_tarif->rutes_id = $request->rutes_id; 
        $tambah_tarif->kendaraans_id = $request->kendaraans_id; 
        $tambah_tarif->tarif_per_orang = $request->tarif_per_orang; 
        $tarif_id = DB::getPdo()->lastInsertId();
       
        $tambah_tarif->save();
      
        return redirect()->back()->with('success');  
    }
    public function edittarif(Request $request, $id){
        $edit_tarif= Tarif::find($id);
        $edit_tarif->rutes_id = $request->rutes_id; 
        $edit_tarif->kendaraans_id = $request->kendaraans_id; 
        $edit_tarif->tarif_per_orang = $request->tarif_per_orang; 
        $tarif_id = DB::getPdo()->lastInsertId();
       
        $edit_tarif->save();
      
        return redirect()->back()->with('success');  
    }
 
    public function destroy(Tarif $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    } 

}
