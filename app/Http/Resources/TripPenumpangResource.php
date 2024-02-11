<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripPenumpangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
              'users_id' => $this->users_id,
              'trips_id' =>$this->trips_id,
              'catatan_lokasi' => $this->catatan_lokasi,
              'barangb' => $this->barangb,
              'foto_barangb' => $this->foto_barangb,
              'posisi_kursi' => $this->posisi_kursi,
              'status' => $this->status,

        ];
    }
}
