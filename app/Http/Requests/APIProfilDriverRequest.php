<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class APIProfilDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'no_hp' => 'required|string|max:16',
            'ktp' => 'required|string|max:16',
            'sim' => 'required|string|max:255',
            'stnk' => 'required|string|unique:users|max:255',
            'foto_kendaraan1' => 'required|string|min:6',
            'foto_kendaraan2' => 'required|string|min:6',
            'foto_kendaraan3' => 'required|string|min:6',
            'foto_kendaraan4' => 'required|string|min:6',
            'foto_kendaraan5' => 'required|string|min:6',
           'tipe_pelayanan' => 'required|string|min:6',
           'no_plat' => 'required|string|max:16',
     
        ];
    }
}
