<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Dosen extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'dosen';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nip', 'user_id', 'nama_dosen',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'dosen_mengajar_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mengajar()
    {
        return $this->hasMany(DosenMengajar::class, 'dosen_id');
    }

    public function mata_kuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'dosen_mengajar', 'dosen_id', 'mata_kuliah_kode');
    }
}
