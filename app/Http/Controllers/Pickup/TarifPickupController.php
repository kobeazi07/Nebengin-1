<?php

namespace App\Http\Controllers\Pickup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\TarifPickup;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class TarifPickupController extends Controller
{
    public function halamanpickuptarif(Request $request){
       
        $rute = Rute::get();
        $datarute = Rute::get();
        $tarifpickup = TarifPickup::get();
        return view('admin.pages.datatarifpickup', 
        compact('rute','tarifpickup','datarute'));

    }
    public function tambahpickuptarif(Request $request){
        $tambah_pickuptarif= new TarifPickup ();
        $tambah_pickuptarif->rutes_id = $request->rutes_id; 
  
        $tambah_pickuptarif->tarif_per_barang = $request->tarif_per_barang; 
        $pickuptarifs_id = DB::getPdo()->lastInsertId();
        $tambah_pickuptarif->save();
      
        return redirect()->back()->with('success');  
    }
    public function editpickuptarif(Request $request, $id){
        $edit_pickuptarif= TarifPickup::find($id);
        $edit_pickuptarif->rutes_id = $request->rutes_id; 

        $edit_pickuptarif->tarif_per_barang = $request->tarif_per_barang; 
        $pickuptarifs_id = DB::getPdo()->lastInsertId();
        $edit_pickuptarif->save();
      
        return redirect()->back()->with('success');  
    }
    public function destroy(TarifPickup $id)
    {
        $id->delete(); 
        return redirect()->back()->with('success','Book deleted');
    } 
}
