<?php

namespace App\Http\Controllers\API;
use App\Models\TarifPickup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PickupTarifController extends Controller
{
    public function showpickuptarif(){
        $pickuptarif = TarifPickup::get();
        return response()->json([
            'pickup_tarifs'=>$pickuptarif
        ]);
    }
    
}
