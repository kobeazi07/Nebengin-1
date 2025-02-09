<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiPembatalanPickupRequest extends FormRequest
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
            'users_id' => 'required|bigInteger|max:255',
            'trips_id' => 'required|bigInteger|max:255',
            'status' => 'required|string|max:255',
            'alasan_pembatalan_id' => 'required|string|max:255',
        ];
    }
}
