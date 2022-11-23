<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //
    public function show($kode)
    {
        $data = Jadwal::with("kelas", "mata_kuliah")->where('kode_jadwal', $kode)->first();

        // return json
        return response()->json([
            'message' => 'List mahasiswa',
            'data' => $data
        ], 200);
    }
}
