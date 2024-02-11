<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postingan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class PostinganController extends Controller
{
    public function halamanpostingan(Request $request){
        $postingan = Postingan::get();
        return view ('admin.pages.postingan',compact('postingan'));
    }
    public function tambahpostingan(Request $request){
        $tambah_postingan = new Postingan();  
   
        $tambah_postingan->judul  = $request->judul;
      
        $tambah_postingan->teks = $request->teks;

     
       $postingans_id = DB::getPdo()->lastInsertId(); 
       if($request->file('gambartul')){
        $gambartul= $request->file('gambartul');
        $filename= 'Postingan_'.$postingans_id .'.'. $gambartul->getClientOriginalName();
        $gambartul->move(public_path('inputan/img/postingan'), $filename);
        $tambah_postingan->gambartul= $filename;
    }
       $tambah_postingan->save();
       return redirect()->back()->with('success');  
    }

    public function editpostingan(Request $request, $id){
        $edit_postingan = Postingan::find($id);  
   
        $edit_postingan->judul  = $request->judul;
      
        $edit_postingan->teks = $request->teks;

     
       $postingans_id = DB::getPdo()->lastInsertId(); 
       if($request->file('gambartul')){
        $gambartul= $request->file('gambartul');
        $filename= 'Postingan_'.$postingans_id .'.'. $gambartul->getClientOriginalName();
        $gambartul->move(public_path('inputan/img/postingan'), $filename);
        $edit_postingan->gambartul= $filename;
    }
    $edit_postingan->save();
       return redirect()->back()->with('success');  
    }

    public function destroy(Postingan $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    }

}
