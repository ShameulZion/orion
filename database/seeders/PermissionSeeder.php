<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        $moduleAdminDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'dashboard',
        ]);

        // Role management
        $moduleAdminRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminRole->id,
            'name' => 'Access Roles',
            'slug' => 'role.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminRole->id,
            'name' => 'Create Role',
            'slug' => 'role.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminRole->id,
            'name' => 'Edit Role',
            'slug' => 'role.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminRole->id,
            'name' => 'Delete Role',
            'slug' => 'role.destroy',
        ]);

        // User management
        $moduleAdminUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminUser->id,
            'name' => 'Access Users',
            'slug' => 'user.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminUser->id,
            'name' => 'Create User',
            'slug' => 'user.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminUser->id,
            'name' => 'Edit User',
            'slug' => 'user.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminUser->id,
            'name' => 'Delete User',
            'slug' => 'user.destroy',
        ]);

        // Category management
        $moduleAdminCategory = Module::updateOrCreate(['name' => 'Service Categories Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminCategory->id,
            'name' => 'Access Categories',
            'slug' => 'category.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminCategory->id,
            'name' => 'Create Category',
            'slug' => 'category.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminCategory->id,
            'name' => 'Edit Category',
            'slug' => 'category.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminCategory->id,
            'name' => 'Delete Category',
            'slug' => 'category.destroy',
        ]);

        
        // Tags management
        $moduleAdminTags = Module::updateOrCreate(['name' => 'Service Tags Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminTags->id,
            'name' => 'Access Tags',
            'slug' => 'tag.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminTags->id,
            'name' => 'Create Tag',
            'slug' => 'tag.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminTags->id,
            'name' => 'Edit Tag',
            'slug' => 'tag.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminTags->id,
            'name' => 'Delete Tag',
            'slug' => 'tag.destroy',
        ]);

        
        // Service management
        $moduleAdminServices = Module::updateOrCreate(['name' => 'Service Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminServices->id,
            'name' => 'Access Services',
            'slug' => 'service.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminServices->id,
            'name' => 'Create Service',
            'slug' => 'service.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminServices->id,
            'name' => 'Edit Service',
            'slug' => 'service.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAdminServices->id,
            'name' => 'Delete Service',
            'slug' => 'service.destroy',
        ]);
    }
}
