<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserskkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'nim' => '361855401104',
        //     'name' => 'Dedi Hariyanto',
        //     'email' => 'tes@gmail.com',
        //     'prodi_id' => '5',
        //     // 'angkatan' => '2018',
        //     'roles' => 'mahasiswa',
        //     'password' => bcrypt('mmmmmmmm'),
        // ]);
        
        // User::create([
        //     'nim' => '361855401102',
        //     'name' => 'Bem',
        //     'email' => 'Bem2022.com',
        //     'prodi_id' => '',
        //     // 'angkatan' => '',
        //     'roles' => 'bem',
        //     'password' => bcrypt('mmmmmmmm'),
        // ]);
        User::create([
            'nim' => 'kemahasiswaan',
            'name' => 'kemahasiswaan',
            'email' => 'Poliwangi@poliwangi.ac.id',
            'prodi_id' => '',
            // 'angkatan' => '',
            'roles' => 'adminutama',
            'password' => bcrypt('poliwangi123'),
        ]);
    }
}
