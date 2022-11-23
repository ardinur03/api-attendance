<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function list($kelas)
    {
        // return json
        return response()->json([
            'message' => 'List mahasiswa',
            'data' => Mahasiswa::where('kelas_kode', $kelas)->get()
        ], 200);
    }
}
