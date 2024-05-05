<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startUserId = 11;

        for ($i = 0; $i < 5; $i++) {
            $userId = $startUserId + $i;

            Pendaftar::create([
                'user_id' => $userId,
                'divisi_id' => rand(1, 5),
                'nomor_hp' => '08123456789',
                'nama_instansi' => 'Instansi ' . ($i + 1),
                'nama_jurusan' => 'Jurusan ' . ($i + 1),
                'nim' => 'NIM' . ($i + 1),
                'link_cv' => 'https://example.com/cv' . ($i + 1),
                'link_porto' => 'https://example.com/porto' . ($i + 1),
            ]);
        }
    }
}
