<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DosenResource extends JsonResource
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
            'nip'        => $this->nip,
            'nama_dosen' => $this->nama_dosen,
            'mengajar'   => $this->mengajar,
            'mata_kuliah' => $this->jenis_mata_kuliah,
            'user'       => $this->user,
        ];
    }
}
