<?php

namespace Database\Seeders;

use App\Models\jeniskegiatan;
use Illuminate\Database\Seeder;

class JeniskegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //jenis atau tingkat atau organisasi kegiatan
        $data1 = jeniskegiatan::create([
            'jenis_kegiatan' => 'PKKMB dan Pra Studi'
        ]);
        $data2 = jeniskegiatan::create([
            'jenis_kegiatan' => 'INTERNASIONAL'
        ]);
        $data3 = jeniskegiatan::create([
            'jenis_kegiatan' => 'NASIONAL'
        ]);
        $data4 = jeniskegiatan::create([
            'jenis_kegiatan' => 'REGIONAL/PROPINSI'
        ]);
        $data5 = jeniskegiatan::create([
            'jenis_kegiatan' => 'KABUPATEN/KOTA'
        ]);
        $data6 = jeniskegiatan::create([
            'jenis_kegiatan' => 'KECAMATAN'
        ]);
        $data7 = jeniskegiatan::create([
            'jenis_kegiatan' => 'DESA'
        ]);
        $data8 = jeniskegiatan::create([
            'jenis_kegiatan' => 'PENGURUS KELAS'
        ]);
        $data9 = jeniskegiatan::create([
            'jenis_kegiatan' => 'KEGIATAN SEMPRO/SEMHAS'
        ]);
        $data10 = jeniskegiatan::create([
            'jenis_kegiatan' => 'MPM'
        ]);
        $data11 = jeniskegiatan::create([
            'jenis_kegiatan' => 'BEM'
        ]);
        $data12 = jeniskegiatan::create([
            'jenis_kegiatan' => 'UKM'
        ]);
        $data13 = jeniskegiatan::create([
            'jenis_kegiatan' => 'HIMA'
        ]);
        $data14 = jeniskegiatan::create([
            'jenis_kegiatan' => 'INTERNAL KAMPUS'
        ]);
        $data15 = jeniskegiatan::create([
            'jenis_kegiatan' => 'NASIONAL UMUM'
        ]);
        $data16 = jeniskegiatan::create([
            'jenis_kegiatan' => 'NASIONAL PORSENI'
        ]);
        $data17 = jeniskegiatan::create([
            'jenis_kegiatan' => 'PKM/PIMNAS'
        ]);
        $data18 = jeniskegiatan::create([
            'jenis_kegiatan' => 'LOKAL'
        ]);
        $data19 = jeniskegiatan::create([
            'jenis_kegiatan' => 'INTERNAL POLIWANGI'
        ]);
    }
}
