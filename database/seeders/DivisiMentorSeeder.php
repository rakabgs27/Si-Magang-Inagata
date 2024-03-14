<?php

namespace Database\Seeders;

use App\Models\DivisiMentor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiMentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DivisiMentor::create([
            'user_id' => "3",
            'divisi_id' => "1",
        ]);

        DivisiMentor::create([
            'user_id' => "4",
            'divisi_id' => "2",
        ]);
    }
}
