<?php

namespace App\Http\Controllers\API;
use App\Models\JenisMotor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisMotoController extends Controller
{
    public function showjenismotor(){
        $jenismotor = JenisMotor::get();
        return response()->json([
            'jenis_motors'=>$jenismotor
        ]);
    }
}
  