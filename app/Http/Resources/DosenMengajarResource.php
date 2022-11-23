<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DosenMengajarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return [
        //     'nip'        => $this->nip,
        //     'nama_dosen' => $this->nama_dosen,
        //     'jadwal'     => $this->jadwal->where('tanggal', date('Y-m-d'))->count() >= 1 ? $this->jadwal->where('tanggal', date('Y-m-d')) : null,
        //     'mengajar' => $this->mengajar,
        // ];

        return [
            'nama_kelas' => $this->nama_kelas . ' - '. $this->nama_prodi,
            'mata_kuliah' => $this->nama_mata_kuliah,
            'jenis_mata_kuliah' => $this->jenis_mata_kuliah,
            'kode_kelas' => $this->kelas_kode,
            'kode_jadwal' => $this->kode_jadwal,
            'kode_mata_kuliah' => $this->mata_kuliah_kode,
            'semester' => $this->semester,
            'tanggal' => $this->tanggal,
            'jam_mulai' => $this->jam_mulai,
            'jam_selesai' => $this->jam_selesai,
            'ruangan' => $this->ruangan,
        ];
    }
}
