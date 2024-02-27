<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::insert(
            [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                    'permission_name' => 'dashboard',
                    'menu_group_id' => 1,
                ],
                [
                    'name' => 'User List',
                    'route' => 'user-management/user',
                    'permission_name' => 'user.index',
                    'menu_group_id' => 2,
                ],
                [
                    'name' => 'Role List',
                    'route' => 'role-and-permission/role',
                    'permission_name' => 'role.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'Permission List',
                    'route' => 'role-and-permission/permission',
                    'permission_name' => 'permission.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'Permission To Role',
                    'route' => 'role-and-permission/assign',
                    'permission_name' => 'assign.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'User To Role',
                    'route' => 'role-and-permission/assign-user',
                    'permission_name' => 'assign.user.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'Menu Group',
                    'route' => 'menu-management/menu-group',
                    'permission_name' => 'menu-group.index',
                    'menu_group_id' => 4,
                ],
                [
                    'name' => 'Menu Item',
                    'route' => 'menu-management/menu-item',
                    'permission_name' => 'menu-item.index',
                    'menu_group_id' => 4,
                ],
                [
                    'name' => 'List Soal',
                    'route' => 'soal-management/list-soal',
                    'permission_name' => 'list-soal.index',
                    'menu_group_id' => 5,
                ],
                [
                    'name' => 'Test Soal',
                    'route' => 'soal-management/test-soal',
                    'permission_name' => 'test-soal.index',
                    'menu_group_id' => 5,
                ],
                [
                    'name' => 'List Jawaban',
                    'route' => 'jawaban-management/list-jawaban',
                    'permission_name' => 'list-jawaban.index',
                    'menu_group_id' => 6,
                ],
                [
                    'name' => 'Test Jawaban',
                    'route' => 'jawaban-management/test-jawaban',
                    'permission_name' => 'test-jawaban.index',
                    'menu_group_id' => 6,
                ],
                [
                    'name' => 'List Pengumuman',
                    'route' => 'pengumuman-management/list-pengumuman',
                    'permission_name' => 'list-pengumuman.index',
                    'menu_group_id' => 7,
                ],
                [
                    'name' => 'Hasil Pengumuman',
                    'route' => 'pengumuman-management/hasil-pengumuman',
                    'permission_name' => 'hasil-pengumuman.index',
                    'menu_group_id' => 7,
                ],
                [
                    'name' => 'List Nilai',
                    'route' => 'nilai-management/list-nilai',
                    'permission_name' => 'list-nilai.index',
                    'menu_group_id' => 8,
                ],
                [
                    'name' => 'Hasil Akhir',
                    'route' => 'nilai-management/hasil-akhir',
                    'permission_name' => 'hasil-akhir.index',
                    'menu_group_id' => 8,
                ],
                [
                    'name' => 'List Divisi',
                    'route' => 'divisi-management/list-divisi',
                    'permission_name' => 'list-divisi.index',
                    'menu_group_id' => 9,
                ],
                [
                    'name' => 'List Wawancara',
                    'route' => 'wawancara-management/list-wawancara',
                    'permission_name' => 'list-wawancara.index',
                    'menu_group_id' => 10,
                ],
                [
                    'name' => 'Jadwal Wawancara',
                    'route' => 'wawancara-management/jadwal-wawancara',
                    'permission_name' => 'jadwal-wawancara.index',
                    'menu_group_id' => 10,
                ],
            ]
        );
    }
}
