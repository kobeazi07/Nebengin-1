<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class RegionController extends Controller
{
    public function halamanregion(){
        $region = Region::get();
        return view('admin.pages.datadaerah',compact('region'));
    }
    

    public function tambahregion(Request $request){

        $tambah_region = new Region();  
   
         $tambah_region->nama  = $request->nama;
       
         $tambah_region->keterangan = $request->keterangan;
      
        $daerahs_id = DB::getPdo()->lastInsertId(); 
        $tambah_region->save();
        return redirect()->back()->with('success');  
        
    }
    
    public function editregion(Request $request, $id){
        $edit_region = Region::find($id);
   
        $edit_region->nama = $request->nama;
        $edit_region->keterangan = $request->keterangan;
      

        $edit_region->save();
        $daerahs_id = DB::getPdo()->lastInsertId(); 
        return redirect()->back()->with('success');  
    }
  
    public function destroy(Region $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    } 
    
    
}
