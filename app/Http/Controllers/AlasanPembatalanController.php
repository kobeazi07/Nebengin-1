<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlasanPembatalan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class AlasanPembatalanController extends Controller
{
    public function halamanalasan(){
        $alasan = AlasanPembatalan::get();
        return view('admin.pages.dataalasan',compact('alasan'));
    }
        public function tambahalasan(Request $request){
        $tambah_alasan = new AlasanPembatalan();  
        $tambah_alasan->alasan  = $request->alasan;
        $alasan_pembatalans_id = DB::getPdo()->lastInsertId(); 
        $tambah_alasan->save();
        return redirect()->back()->with('success');  
    }
    
    public function editalasan(Request $request, $id){
        $edit_alasan = AlasanPembatalan::find($id);
        $edit_alasan->alasan = $request->alasan;    
        $edit_alasan->save();
        $alasan_pembatalans_id = DB::getPdo()->lastInsertId(); 
        return redirect()->back()->with('success');  
    }
  
    public function destroy(AlasanPembatalan $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    } 
}
 