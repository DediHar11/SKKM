<?php

namespace Database\Seeders;

use App\Models\kategorikegiatan;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = kategorikegiatan::create([
            'kategori_kegiatan' => 'KEGIATAN WAJIB'
        ]);
        $data2 = kategorikegiatan::create([
            'kategori_kegiatan' => 'KEPENGURUSAN ORGANISASI SELAIN ORGANISASI KEMAHASISWAAN INTRA'
        ]);
        $data3 = kategorikegiatan::create([
            'kategori_kegiatan' => 'KEANGGOTAAN ORGANISASI INTERNAL KAMPUS POLIWANGI'
        ]);
        $data4 = kategorikegiatan::create([
            'kategori_kegiatan' => 'KEPANITIAAN'
        ]);
        $data5 = kategorikegiatan::create([
            'kategori_kegiatan' => 'KEJUARAAN/KOMPETENSI/PERLOMBAAN'
        ]);
        $data6 = kategorikegiatan::create([
            'kategori_kegiatan' => 'PENELITIAN, PENGABDIAN MASYARAKAT, SEMINAR, KULIAH TAMU, PEMATERI DAN KEGIATAN ILMIAH LAINNYA'
        ]);
        $data7 = kategorikegiatan::create([
            'kategori_kegiatan' => 'PENGHARGAAN AKADEMIK DAN NON AKADEMIK'
        ]);
        $data8 = kategorikegiatan::create([
            'kategori_kegiatan' => 'HAK PATEN, HAK CIPTA'
        ]);
        $data9 = kategorikegiatan::create([
            'kategori_kegiatan' => 'PERTANDINGAN PERSAHABATAN ANTAR KAMPUS/JURUSAN DENGAN PIHAK LAIN/INDUSTRI/INSTITUSI'
        ]);
    }
}
