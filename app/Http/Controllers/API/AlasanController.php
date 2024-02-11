<?php
namespace App\Http\Controllers\API;
use App\Models\AlasanPembatalan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlasanController extends Controller
{
    public function showalasan(){
        $alasan= AlasanPembatalan::get();
        return response()->json([
            'alasan_pembatalanas'=>$alasan
        ]);
    }
}
