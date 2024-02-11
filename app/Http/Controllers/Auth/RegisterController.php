<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use id;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        request()->validate([
            'name' => ['alpa_num', 'required', 'unique:users,name' ],
            'email' => ['email', 'required', 'unique:users,email' ],
            'password' => [ 'required' ],
            'no_hp' => ['no_hp', 'required', 'unique:users,no_hp' ],
            'role' => ['role', 'required', 'unique:users,role' ],
            'status' => ['status', 'unique:users,status' ]
            
        ]);
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt (request('password')),
            'no_hp' => request('no_hp'),
            'role' => request('role'),
            'status' => request('status'),
        ]);

        return response('Terimakasih telah Mendaftar');
    }
    
}