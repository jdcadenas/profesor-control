<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Adminname admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}

// Create permissions
// Permission::firstOrCreate(['name'=>'write-a-post']);
// Permission::firstOrCreate(['name'=>'edit-a-post']);
// Permission::firstOrCreate(['name'=>'delete-a-post']);
// // Create roles
// $superAdmin = Role::firstOrCreate(['name'=>'SuperAdmin']);
// $admin = Role::firstOrCreate(['name'=>'Admin']);
// // Give permission to certain role
// $superAdmin->givePermissionTo(['write-a-post', 'edit-a-post', 'delete-a-post']);
// $admin->givePermissionTo(['write-a-post']);
// // Assign role to user
// User::find(1)->assignRole(['SuperAdmin]);
// User::find(2)->assignRole(['Admin']);