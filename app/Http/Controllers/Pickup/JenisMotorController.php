<?php

namespace App\Http\Controllers\Pickup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisMotor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class JenisMotorController extends Controller
{
    public function halamanjenismotor(){
        $jenismotor = JenisMotor::get();
        return view('admin.pages.jenismotor',compact('jenismotor'));
    }
    public function tambahjenismotor(Request $request){
        $tambah_jenismotor = new JenisMotor();  
   
        $tambah_jenismotor->jenis_motor  = $request->jenis_motor;
      
        $tambah_jenismotor->tarif_per_motor = $request->tarif_per_motor;

     
       $jenis_motors_id = DB::getPdo()->lastInsertId(); 
      
       $tambah_jenismotor->save();
       return redirect()->back()->with('success');  
    }
    public function editjenismotor(Request $request, $id){
        $edit_jenismotor = JenisMotor::find($id);  
        $edit_jenismotor->jenis_motor  = $request->jenis_motor;
        $edit_jenismotor->tarif_per_motor = $request->tarif_per_motor;
       $jenis_motors_id = DB::getPdo()->lastInsertId(); 
      
       $edit_jenismotor->save();
       return redirect()->back()->with('success');  
    }
    public function destroy(JenisMotor $id)
    {
    $id->delete(); 
     return redirect()->back()->with('success','Book deleted');
    }

}
