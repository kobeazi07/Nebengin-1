<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PProfilResource extends JsonResource
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
            'name'=>$this->name,
            'no_hp'=>$this->no_hp,
            'email' => $this->email,
            'password' => $this->password,
            'identitas' => $this->identitas,
            
           ];
    }
}
