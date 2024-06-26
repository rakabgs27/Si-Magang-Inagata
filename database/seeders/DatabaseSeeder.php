<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleAndPermissionSeeder::class,
            MenuGroupSeeder::class,
            MenuItemSeeder::class,
            ProfileSeeder::class,
            DivisiSeeder::class,
            PendaftarSeeder::class,
            DivisiMentorSeeder::class,
            SoalSeeder::class,
            FileMateriSeeder::class,
            SoalPendaftarSeeder::class,
            JawabanPendaftarSeeder::class,
            NilaiPendaftarSeeder::class,
            ListWawancaraSeeder::class,
            NilaiWawancaraPendaftarSeeder::class,
            NilaiReviewerSeeder::class,
        ]);
    }
}
