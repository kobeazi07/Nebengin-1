<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiTripRequest extends FormRequest
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
            'users_id' => 'required|string|max:255',
            'tarifs_id' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'catatan' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'jam_keberangkatan' => 'required|string|max:255',
        ];
    }
}
