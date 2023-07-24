<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_standard = Role::create(['name' => 'standard']);
        $role_editor = Role::create(['name' => 'editor']);


        $permission_read = Permission::create(['name' => 'read products']);
        $permission_edit = Permission::create(['name' => 'edit products']);
        $permission_write = Permission::create(['name' => 'write products']);
        $permission_delete = Permission::create(['name' => 'delete products']);

        $permissions_admin =[
            $permission_read,
            $permission_edit,
            $permission_write,
            $permission_delete
        ];

        $permissions_editor =[
            $permission_read,
            $permission_edit,
        ];

        $role_admin->syncPermissions($permissions_admin);

        $role_standard->givePermissionTo($permission_read);
        $role_editor->givePermissionTo($permissions_editor);

    }
}
