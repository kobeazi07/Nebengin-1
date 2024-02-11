<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiTripPenumpangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'users_id' => 'required|bigInteger|max:255',
            'tarifs_id' => 'required|bigInteger|max:255',
            'catatan_lokasi' => 'required|string|max:255',
            'barangb' => 'required|string|max:255',
            'foto_barangb' => 'required|string|max:255',
            'posisi_kursi' => 'required|string|max:255',
        ];
    }
}
