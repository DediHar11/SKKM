<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\KategoriSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(KategoriSeeder::class);
        $this->call(JeniskegiatanSeeder::class);
        $this->call(PrestasikegiatanSeeder::class);
        $this->call(UserskkmSeeder::class);
        $this->call(ProdiSeeder::class);
    }
}
