<?php

namespace Database\Seeders;

use App\Models\MenuGroup;
use Illuminate\Database\Seeder;

class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuGroup::insert(
            [
                [
                    'name' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'permission_name' => 'dashboard',
                ],
                [
                    'name' => 'Users Management',
                    'icon' => 'fas fa-users',
                    'permission_name' => 'user.management',
                ],
                [
                    'name' => 'Role Management',
                    'icon' => 'fas fa-user-tag',
                    'permisison_name' => 'role.permission.management',
                ],
                [
                    'name' => 'Menu Management',
                    'icon' => 'fas fa-bars',
                    'permisison_name' => 'menu.management',
                ],
                [
                    'name' => 'Soal Management',
                    'icon' => 'fas fa-book-open',
                    'permisison_name' => 'soal.management',
                ],
                [
                    'name' => 'Jawaban Management',
                    'icon' => 'fas fa-chalkboard',
                    'permisison_name' => 'jawaban.management',
                ],
                [
                    'name' => 'Pengumuman Management',
                    'icon' => 'fas fa-envelope',
                    'permisison_name' => 'pengumuman.management',
                ],
                [
                    'name' => 'Divisi Management',
                    'icon' => 'fas fa-user-graduate',
                    'permisison_name' => 'divisi.management',
                ],
                [
                    'name' => 'Nilai Management',
                    'icon' => 'fas fa-chart-simple',
                    'permisison_name' => 'nilai.management',
                ],
                [
                    'name' => 'Wawancara Management',
                    'icon' => 'fas fa-calendar-days',
                    'permisison_name' => 'wawancara.management',
                ],
            ]
        );
    }
}
