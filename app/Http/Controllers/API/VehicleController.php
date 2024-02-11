<?php
namespace App\Http\Controllers\API;
use App\Models\Kendaraan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function showkendaraan(){
    $kendaraan = Kendaraan::get();
        return response()->json([
            'kendaraans'=>$kendaraan
    ]);
    }
}
