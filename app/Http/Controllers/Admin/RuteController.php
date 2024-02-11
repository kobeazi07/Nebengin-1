<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class RuteController extends Controller
{
public function halamanrute(Request $request){

        $rutes = Rute::get();
        $region =  Region::get();
        return view ('admin.pages.datarute',compact('rutes','region'));
    }

    public function tambahrute(Request $request){
        $tambah_rute = new Rute ();
        $tambah_rute->daerah_asal = $request->daerah_asal; 
        $tambah_rute->daerah_tujuan = $request->daerah_tujuan; 
        $rute_id = DB::getPdo()->lastInsertId();
       
        $tambah_rute->save();
      
        return redirect()->back()->with('success');  
    }

    
    public function editrute(Request $request, $id){
        $edit_rute = Rute::find($id);  
        $edit_rute->daerah_asal = $request->daerah_asal; 
        $edit_rute->daerah_tujuan = $request->daerah_tujuan; 
        $rute_id = DB::getPdo()->lastInsertId();
       
        $edit_rute->save();
      
        return redirect()->back()->with('success');  
    }

    public function destroy(Rute $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    }


    
}
