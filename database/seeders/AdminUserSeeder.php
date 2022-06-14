<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $applicantRole = Role::create(['name' => 'Applicant']);
        $verifierRole = Role::create(['name' => 'Verifier']);
        $superRole = Role::create(['name' => 'Super-Admin']);
        // $permission = Permission::create(['name' => 'manage tasks']);
        // $permission->assignRole($adminRole);
 
        $adminUser = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        $adminUser->assignRole([$adminRole->id]);
    }
}
