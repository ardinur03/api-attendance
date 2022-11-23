<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Jadwal extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'jadwal';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'dosen_mengajar_id',
        'kode_jadwal',
        'kelas_kode',
        'mata_kuliah_kode',
        'semester',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
    ];

    public function dosen_mengajar()
    {
        return $this->belongsTo(DosenMengajar::class, 'dosen_mengajar_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_kode', 'kode_kelas');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_kode', 'kode_mata_kuliah');
    }
}
