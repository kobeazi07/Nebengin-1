<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostiganResource extends JsonResource
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
        'judul' => $this->judul,
        'teks' => $this->teks,
        'gambartul' => $this->gambartul,
        'created_at' => $this-> created_at,
        'updated_at' => $this->updated_at,
       ];
    }
}
