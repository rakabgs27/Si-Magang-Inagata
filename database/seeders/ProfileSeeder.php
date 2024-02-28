<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'deskripsi' => "Halo",
            'foto' => null,
            'user_id' => 1,
        ]);
        Profile::create([
            'deskripsi' => "Halo",
            'foto' => null,
            'user_id' => 2,
        ]);
    }
}
