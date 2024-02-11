<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PickTripPenumpang extends JsonResource
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
              'pickup_trips_id' =>$this->pickup_trips_id,
              'jenis_motor_id' =>$this->jenis_motor_id,
              'note_lokasi_jemput' => $this->note_lokasi_jemput,
              'catatan_antar' => $this->catatan_antar,
              'foto' => $this->foto,
              'slot' => $this->slot,
              'status' => $this->status,
              'total' => $this->total,
               
        ];
    }
}
