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
            'list-pendaftar',
            'list-soal',
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
            'user.management',
            'user.index',
        ]);

        // create manager
        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo(Permission::all());

        //assign user id 1 ke manager
        $user = User::find(1);
        $user->assignRole('manager');
        $user = User::find(2);
        $user->assignRole('user');
    }
}
