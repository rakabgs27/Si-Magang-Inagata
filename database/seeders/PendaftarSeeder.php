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
        $divisiIds = 1;

        for ($i = 0; $i < 10; $i++) {
            $userId = $startUserId + $i;

            Pendaftar::create([
                'user_id' => $userId,
                'divisi_id' => $divisiIds,
                'nomor_hp' => '08123456789',
                'nama_instansi' => 'Instansi ' . ($i + 1),
                'nama_jurusan' => 'Jurusan ' . ($i + 1),
                'nim' => 'NIM' . ($i + 1),
                'link_cv' => 'https://example.com/cv' . ($i + 1),
                'link_porto' => 'https://example.com/porto' . ($i + 1),
                'status' => 'Terverifikasi',
            ]);
        }

        Pendaftar::create([
            'user_id' => 21,
            'divisi_id' => $divisiIds,
            'nomor_hp' => '08123456789',
            'nama_instansi' => 'Instansi ',
            'nama_jurusan' => 'Jurusan ',
            'nim' => 'NIM',
            'link_cv' => 'https://example.com/cv',
            'link_porto' => 'https://example.com/porto',
            'status' => 'Pending',
        ]);
        Pendaftar::create([
            'user_id' => 22,
            'divisi_id' => $divisiIds,
            'nomor_hp' => '08123456789',
            'nama_instansi' => 'Instansi ',
            'nama_jurusan' => 'Jurusan ',
            'nim' => 'NIM',
            'link_cv' => 'https://example.com/cv',
            'link_porto' => 'https://example.com/porto',
            'status' => 'Pending',
        ]);
        Pendaftar::create([
            'user_id' => 23,
            'divisi_id' => $divisiIds,
            'nomor_hp' => '08123456789',
            'nama_instansi' => 'Instansi ',
            'nama_jurusan' => 'Jurusan ',
            'nim' => 'NIM',
            'link_cv' => 'https://example.com/cv',
            'link_porto' => 'https://example.com/porto',
            'status' => 'Pending',
        ]);
        Pendaftar::create([
            'user_id' => 24,
            'divisi_id' => $divisiIds,
            'nomor_hp' => '08123456789',
            'nama_instansi' => 'Instansi ',
            'nama_jurusan' => 'Jurusan ',
            'nim' => 'NIM',
            'link_cv' => 'https://example.com/cv',
            'link_porto' => 'https://example.com/porto',
            'status' => 'Tertolak',
        ]);
        Pendaftar::create([
            'user_id' => 25,
            'divisi_id' => $divisiIds,
            'nomor_hp' => '08123456789',
            'nama_instansi' => 'Instansi ',
            'nama_jurusan' => 'Jurusan ',
            'nim' => 'NIM',
            'link_cv' => 'https://example.com/cv',
            'link_porto' => 'https://example.com/porto',
            'status' => 'Tertolak',
        ]);
    }
}
