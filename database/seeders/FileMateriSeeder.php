<?php

namespace Database\Seeders;

use App\Models\FileMateri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileMateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FileMateri::create([
            'soal_id' => 1,
            'files' => 'sample_file.pdf'
        ]);
    }
}
