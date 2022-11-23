<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenMengajar extends Model
{
    use HasFactory;
    protected $table = 'dosen_mengajar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dosen_id',
        'mata_kuliah_kode',
        'jenis_mata_kuliah',
    ];

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_kode');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
