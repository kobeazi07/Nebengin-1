<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function showrute(){
        $rute=Rute::get();
        return response()->json([
            'rutes'=>$rute
        ]);
    }
}
