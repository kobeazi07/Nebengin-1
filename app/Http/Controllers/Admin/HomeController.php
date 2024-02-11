<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use id;
use App\Models\User;
use App\Models\Trip;
use App\Models\M_Saldo;
use App\Models\K_Saldo;

class HomeController extends Controller
{
    public function index(){
        $driver = User::where('role', '=', 'Driver')->count();
        $trip = Trip::get();
        $akun = User::get()->count();
        $riwayattrip = Trip::get();
        $m_saldo = M_Saldo::first();
        $k_saldo = K_Saldo::first();
        return view('admin.pages.dashboard',compact('driver','trip','akun','riwayattrip','m_saldo','k_saldo'));
    }

    public function edit_minimal_saldo(Request $request){
        M_Saldo::first()->update([
            'nominal' => $request->nominal,
        ]);
        return redirect()->back();
    }
    public function edit_kurang_saldo(Request $request){
        K_Saldo::first()->update([
            'nominal' => $request->nominal,
        ]);
        return redirect()->back();
    }
}
    