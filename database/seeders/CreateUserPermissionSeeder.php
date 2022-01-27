<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreateUserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name'       => 'user.index',
            'name_group' => 'user', 
            'guard_name' => 'web',
        ]);
        

        $permission = Permission::create([
            'name'       => 'user.create',
            'name_group' => 'user', 
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'user.store', 
            'name_group' => 'user',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'user.show',
            'name_group' => 'user', 
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'user.edit',
            'name_group' => 'user', 
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'user.update', 
            'name_group' => 'user',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'user.destroy', 
            'name_group' => 'user',
            'guard_name' => 'web',
        ]);

        // Role Permission

        $permission = Permission::create([
            'name'       => 'role.index', 
            'name_group' => 'role',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'role.create', 
            'name_group' => 'role',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'role.store', 
            'name_group' => 'role',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'role.show', 
            'name_group' => 'role',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'role.edit',
            'name_group' => 'role', 
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'role.update',
            'name_group' => 'role', 
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'role.destroy', 
            'name_group' => 'role',
            'guard_name' => 'web',
        ]);

        // Permission Permission
        
        $permission = Permission::create([
            'name'       => 'permission.index', 
            'name_group' => 'permission',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'permission.create', 
            'name_group' => 'permission',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'permission.store', 
            'name_group' => 'permission',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'permission.show', 
            'name_group' => 'permission',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'permission.edit', 
            'name_group' => 'permission',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'permission.update',
            'name_group' => 'permission', 
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'permission.destroy', 
            'name_group' => 'permission',
            'guard_name' => 'web',
        ]);

        // Company Permission
        
        $permission = Permission::create([
            'name'       => 'company.index', 
            'name_group' => 'company',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'company.create', 
            'name_group' => 'company',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'company.store', 
            'name_group' => 'company',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'company.show', 
            'name_group' => 'company',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'company.edit', 
            'name_group' => 'company',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'company.update',
            'name_group' => 'company', 
            'guard_name' => 'web',
        ]);

        $permission = Permission::create([
            'name'       => 'company.destroy', 
            'name_group' => 'company',
            'guard_name' => 'web',
        ]);
    }
}
