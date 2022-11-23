<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     JurusanSeeder::class,
        //     ProdiSeeder::class,
        //     MataKuliahSeeder::class,
        // ]);
        // \App\Models\User::factory(20)->create();
        // \App\Models\Dosen::factory(20)->create();
        // $this->call([
        //     KelasSeeder::class,
        //     DosenMengajarSeeder::class,
        // ]);
        // \App\Models\Mahasiswa::factory(100)->create();
        \App\Models\Jadwal::factory(20)->create();
    }
}
