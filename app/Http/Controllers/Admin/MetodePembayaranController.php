<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class MetodePembayaranController extends Controller
{
    public function halamanmetopem (){
        $metode = MetodePembayaran::get();
        return view ('admin.pages.metodepembayaran',compact('metode'));
    }
    public function tambahmetopem(Request $request){
        $tambah_metopem = new MetodePembayaran();  
   
        $tambah_metopem->namabank  = $request->namabank;
        $tambah_metopem->norekening  = $request->norekening;
        $tambah_metopem->namapemilik = $request->namapemilik;
      

       $metopems_id = DB::getPdo()->lastInsertId(); 
     
        $tambah_metopem->save();
        return redirect()->back()->with('success');  

    }
    public function editmetopem(Request $request, $id){
        $edit_metopem = MetodePembayaran::find($id);  
   
        $edit_metopem->namabank  = $request->namabank;
        $edit_metopem->norekening  = $request->norekening;
        $edit_metopem->namapemilik = $request->namapemilik;
      

       $metopems_id = DB::getPdo()->lastInsertId(); 
     
        $edit_metopem->save();
        return redirect()->back()->with('success');  

    }
    public function destroy(MetodePembayaran $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    }

}
