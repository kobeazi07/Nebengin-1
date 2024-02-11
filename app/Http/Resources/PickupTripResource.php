<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PickupTripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
              'users_id' => $this->users_id,
                'pickup_tarifs_id' => $this->pickup_tarifs_id,
                'tanggal' =>  $this->tanggal,
                'waktu' => $this->waktu,
                'jam_keberangkatan' => $this->jam_keberangkatan,
                'catatan_lokasi' => $this->catatan_lokasi,
                'status_trip' => "Menunggu Driver",
                'note' => $this->note,
                'kapasitas' => $this->kapasitas
        ];
    }
}
