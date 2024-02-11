<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    public function showmetopem(){
        $metopem = MetodePembayaran::get();
        return response()->json([
            'metodes' => $metopem    
        ]);
    }
}
