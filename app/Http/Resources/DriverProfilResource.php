<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverProfilResource extends JsonResource
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

            'ktp' => $this->ktp,
            'sim' => $this->sim,
            'stnk' => $this->stnk,
            'fotokendaraan1' => $this->fotokendaraan1,
            'fotokendaraan2' => $this->fotokendaraan2,
            'fotokendaraan3' => $this->fotokendaraan3,
            'fotokendaraan4' => $this->fotokendaraan4,
            'fotokendaraan5' => $this->fotokendaraan5,
            'tipe_pelayanan' => $this->tipepelayanan,
            'no_plat' =>$this->no_plat,
        ];
    }
}
