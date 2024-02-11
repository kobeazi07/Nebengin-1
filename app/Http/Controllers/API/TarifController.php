<?php

namespace App\Http\Controllers\API;

use App\Models\Tarif;
use App\Models\Rute;
use App\Models\Region;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function showtarif(){
        $tarif= Tarif::get();
        return response()->json([
            'tarifs'=>$tarif
        ]);

    }
    public function showrute(){
        $rute= Rute::get();
        return response()->json([
            'rutes'=>$rute
        ]);

    }
    public function showdaerah(){
        $daerah= Region::get();
        return response()->json([
            'daerahs'=>$daerah
        ]);

    }
}
