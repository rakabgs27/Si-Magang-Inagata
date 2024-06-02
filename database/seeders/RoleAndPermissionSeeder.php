<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'user.management']);
        Permission::create(['name' => 'role.permission.management']);
        Permission::create(['name' => 'menu.management']);
        Permission::create(['name' => 'soal.management']);
        Permission::create(['name' => 'jawaban.management']);
        Permission::create(['name' => 'wawancara.management']);
        Permission::create(['name' => 'pengumuman.management']);
        Permission::create(['name' => 'divisi.management']);
        Permission::create(['name' => 'nilai.management']);

        //user
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.destroy']);
        Permission::create(['name' => 'user.import']);
        Permission::create(['name' => 'user.export']);

        //role
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.destroy']);
        Permission::create(['name' => 'role.import']);
        Permission::create(['name' => 'role.export']);

        //permission
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.destroy']);
        Permission::create(['name' => 'permission.import']);
        Permission::create(['name' => 'permission.export']);

        //assignpermission
        Permission::create(['name' => 'assign.index']);
        Permission::create(['name' => 'assign.create']);
        Permission::create(['name' => 'assign.edit']);
        Permission::create(['name' => 'assign.destroy']);

        //assingusertorole
        Permission::create(['name' => 'assign.user.index']);
        Permission::create(['name' => 'assign.user.create']);
        Permission::create(['name' => 'assign.user.edit']);

        //menu group
        Permission::create(['name' => 'menu-group.index']);
        Permission::create(['name' => 'menu-group.create']);
        Permission::create(['name' => 'menu-group.edit']);
        Permission::create(['name' => 'menu-group.destroy']);

        //menu item
        Permission::create(['name' => 'menu-item.index']);
        Permission::create(['name' => 'menu-item.create']);
        Permission::create(['name' => 'menu-item.edit']);
        Permission::create(['name' => 'menu-item.destroy']);

        $seeders = [
            'divisi-mentor',
            'list-pendaftar',
            'list-soal',
            'assign-soal',
            'test-soal',
            'list-jawaban',
            'test-jawaban',
            'list-pengumuman',
            'hasil-pengumuman',
            'list-nilai',
            'hasil-akhir',
            'list-divisi',
            'list-wawancara',
            'jadwal-wawancara',
        ];

        $actions = ['index', 'create', 'edit', 'destroy'];

        foreach ($seeders as $seeder) {
            foreach ($actions as $action) {
                $permissionName = $seeder . '.' . $action;
                Permission::create(['name' => $permissionName]);
            }
        }

        // create roles
        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo([
            'dashboard',
            'soal.management',
            'test-soal.index',
            'jawaban.management',
            'test-jawaban.index',
            'list-jawaban.create',
            'wawancara.management',
            'jadwal-wawancara.index',
            'pengumuman.management',
            'hasil-pengumuman.index',
        ]);

        // create manager
        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo([
            'dashboard',
            'user.management',
            'user.index','user.create','user.edit','user.destroy',
            'divisi-mentor.index','divisi-mentor.create','divisi-mentor.edit','divisi-mentor.destroy',
            'list-pendaftar.index','list-pendaftar.create','list-pendaftar.edit','list-pendaftar.destroy',
            'role.permission.management',
            'role.index','role.create','role.edit','role.destroy',
            'permission.index','permission.index','permission.create','permission.edit','permission.destroy',
            'assign.user.index','assign.user.create','assign.user.edit',
            'assign.index','assign.create','assign.edit','assign.destroy',
            'menu.management',
            'menu-group.index','menu-group.create','menu-group.edit','menu-group.destroy',
            'menu-item.index','menu-item.create','menu-item.edit','menu-item.destroy',
            'divisi.management',
            'list-divisi.index','list-divisi.create','list-divisi.edit','list-divisi.destroy',
            'soal.management',
            'list-soal.index','list-soal.create','list-soal.edit','list-soal.destroy',
            'assign-soal.index','assign-soal.create','assign-soal.edit','assign-soal.destroy',
            'jawaban.management',
            'list-jawaban.index','list-jawaban.create','list-jawaban.edit','list-jawaban.destroy',
            'nilai.management',
            'hasil-akhir.index','hasil-akhir.create','hasil-akhir.edit','hasil-akhir.destroy',
            'wawancara.management',
            'list-wawancara.index','list-wawancara.create','list-wawancara.edit','list-wawancara.destroy',
            'pengumuman.management',
            'list-pengumuman.index','list-pengumuman.create','list-pengumuman.edit','list-pengumuman.destroy',
        ]);

        // create mentor
        $role = Role::create(['name' => 'mentor']);
        $role->givePermissionTo([
            'dashboard',
            'soal.management',
            'list-soal.index','list-soal.create','list-soal.edit','list-soal.destroy',
            'jawaban.management',
            'list-jawaban.index','list-jawaban.create','list-jawaban.edit','list-jawaban.destroy',
            'nilai.management',
            'list-nilai.index','list-nilai.create','list-nilai.edit','list-nilai.destroy',
            'wawancara.management',
            'list-wawancara.index','list-wawancara.create','list-wawancara.edit','list-wawancara.destroy',
        ]);

        //assign user id 1 ke manager
        $user = User::find(1);
        $user->assignRole('manager');
        $user = User::find(2);
        $user->assignRole('user');
        $user = User::find(3);
        $user->assignRole('mentor');
        $user = User::find(4);
        $user->assignRole('mentor');
        $user = User::find(5);
        $user->assignRole('mentor');
        $user = User::find(6);
        $user->assignRole('mentor');
        $user = User::find(7);
        $user->assignRole('mentor');
        $user = User::find(8);
        $user->assignRole('mentor');
        $user = User::find(9);
        $user->assignRole('mentor');
        $user = User::find(10);
        $user->assignRole('mentor');
        $user = User::find(11);
        $user->assignRole('user');
        $user = User::find(12);
        $user->assignRole('user');
        $user = User::find(13);
        $user->assignRole('user');
        $user = User::find(14);
        $user->assignRole('user');
        $user = User::find(15);
        $user->assignRole('user');
    }
}
