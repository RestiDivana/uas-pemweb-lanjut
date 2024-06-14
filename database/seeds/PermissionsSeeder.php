<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();
        Permission::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();

        $roles = ['superadmin', 'admin', 'writer', 'user'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $adminAccessPermission = Permission::create(['name' => 'admin access']);
        $adminRole = Role::whereName('admin')->first();
        $adminRole->givePermissionTo($adminAccessPermission);

        $writerRole = Role::whereName('writer')->first();
        $writerPermissions = [
            'blog categories read',
            'blog categories create',
            'blog categories update',
            'blog categories delete',
            'blog posts read',
            'blog posts create',
            'blog posts update',
            'blog posts delete',
        ];

        foreach ($writerPermissions as $name) {
            $permission = Permission::create(['name' => $name]);
            $writerRole->givePermissionTo($permission);
        }

        $writerRole->givePermissionTo($adminAccessPermission);

        $otherPermissions = [
            'users read',
            'users create',
            'users update',
            'users delete',
            'settings',
        ];

        foreach ($otherPermissions as $name) {
            Permission::create(['name' => $name]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
