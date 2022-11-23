<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DosenMengajarResource;
use App\Http\Resources\DosenResource;
use App\Models\Dosen;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        return DosenResource::collection(Dosen::with('mengajar', 'mata_kuliah')->where('user_id', auth()->user()->id)->get());
    }

    public function JadwalDosenHariIni()
    {
        // // relasi dosen dengan jadwal dan mengambil jadwal tanggal hari ini
        // $jadwal = Dosen::with('jadwal', 'mengajar')->where('user_id', auth()->user()->id)->get();


        // // jika dosen tidak ada jadwal maka return null
        // if (count($jadwal) == 0) {
        //     return response()->json([
        //         'message' => 'Tidak ada jadwal hari ini',
        //     ], 404);
        // }

        // return DosenMengajarResource::collection($jadwal);

        $data = DB::table('jadwal')
            ->join('dosen_mengajar', 'jadwal.dosen_mengajar_id', '=', 'dosen_mengajar.id')
            ->join('dosen', 'dosen_mengajar.dosen_id', '=', 'dosen.id')
            ->join('mata_kuliah', 'jadwal.mata_kuliah_kode', '=', 'mata_kuliah.kode_mata_kuliah')
            ->join('kelas', 'jadwal.kelas_kode', '=', 'kelas.kode_kelas')
            ->join('prodi', 'kelas.prodi_kode', '=', 'prodi.kode_prodi')
            ->select(
                'dosen.*',
                'kelas.nama_kelas',
                'jadwal.*',
                'prodi.nama_prodi',
                'mata_kuliah.nama_mata_kuliah',
                'dosen_mengajar.jenis_mata_kuliah',
            )->where('dosen_mengajar.dosen_id', auth()->user()->dosen()->first()->id)
            ->where('jadwal.tanggal', date('Y-m-d'))
            ->get();
        // jika dosen tidak ada jadwal maka return null
        if (count($data) == 0) {
            return response()->json([
                'message' => 'Tidak ada jadwal hari ini',
                'data' => []
            ], 404);
        }

        // jika dosen ada jadwal maka return jadwal
        return response()->json([
            'message' => 'Jadwal hari ini',
            'data_dosen' => [
                'nip' => $data[0]->nip,
                'nama_dosen' => $data[0]->nama_dosen,
            ],
            'data' => DosenMengajarResource::collection($data),
        ], 200);
    }
}
