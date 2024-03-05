<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::insert(
            [
                [
                    'nama_divisi' => 'Backend Developer',
                ],
                [
                    'nama_divisi' => 'Frontend Developer',
                ],
                [
                    'nama_divisi' => 'Mobile Developer',
                ],
                [
                    'nama_divisi' => 'UX/UI Design',
                ],
                [
                    'nama_divisi' => 'System Analyst',
                ],
                [
                    'nama_divisi' => 'Management',
                ],
                [
                    'nama_divisi' => 'Media & Ads',
                ],
                [
                    'nama_divisi' => 'Icon & Illustration',
                ],
            ]
        );
    }
}
