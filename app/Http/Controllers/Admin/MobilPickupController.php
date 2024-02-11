<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pickup;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class MobilPickupController extends Controller
{
    public function halamanpickup (){
        $pickup= Pickup::get();
        return view('admin.pages.mobilpickup',compact('pickup'));
    }


    public function tambahpickup(Request $request){
        $tambah_pickup = new Pickup();  
   
        $tambah_pickup->tipe_pickup  = $request->tipe_pickup;
      

       $pickups_id = DB::getPdo()->lastInsertId(); 
       if($request->file('gambarpi')){
        $gambarpi= $request->file('gambarpi');
        $filename= 'Pickup_'.$pickups_id .'.'. $gambarpi->getClientOriginalName();
        $gambarpi->move(public_path('inputan/img/pickup'), $filename);
        $tambah_pickup->gambarpi= $filename;
        }
        $tambah_pickup->save();
        return redirect()->back()->with('success');  

    }

    public function editpickup(Request $request, $id){
        $edit_pickup = Pickup::find($id);  
   
        $edit_pickup->tipe_pickup  = $request->tipe_pickup;
      

       $pickups_id = DB::getPdo()->lastInsertId(); 
       if($request->file('gambarpi')){
        $gambarpi= $request->file('gambarpi');
        $filename= 'Pickup_'.$pickups_id .'.'. $gambarpi->getClientOriginalName();
        $gambarpi->move(public_path('inputan/img/pickup'), $filename);
        $edit_pickup->gambarpi= $filename;
        }
        $edit_pickup->save();
        return redirect()->back()->with('success');  

    }
    public function destroy(Pickup $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    }

    

}