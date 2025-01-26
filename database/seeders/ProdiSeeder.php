<?php

namespace Database\Seeders;

use App\Models\prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = prodi::create([
            'prodi' => 'D4 Agribisnis',
            'poin' => 14
        ]);
        $data2 = prodi::create([
            'prodi' => 'D4 Manajemen Bisnis Pariwisata',
            'poin' => 14
        ]);
        $data3 = prodi::create([
            'prodi' => 'D4 Teknik Manufaktur Kapal',
            'poin' => 14
        ]);
        $data4 = prodi::create([
            'prodi' => 'D4 Teknologi Pengolahan Hasil Ternak',
            'poin' => 14
        ]);
        $data5 = prodi::create([
            'prodi' => 'D4 Teknologi Rekayasa Perangkat Lunak',
            'poin' => 14
        ]);
        $data6 = prodi::create([
            'prodi' => 'D4 Teknologi Rekayasa Komputer',
            'poin' => 14
        ]);
        $data7 = prodi::create([
            'prodi' => 'D4 Bisnis Digital',
            'poin' => 14
        ]);
        $data8 = prodi::create([
            'prodi' => 'D4 Teknologi Rekayasa Manufaktur',
            'poin' => 14
        ]);
        $data9 = prodi::create([
            'prodi' => 'D3 Teknik Sipil',
            'poin' => 12
        ]);
    }
}
