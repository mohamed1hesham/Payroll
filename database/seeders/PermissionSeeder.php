<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AdminPermission = Permission::create(['name' => 'edit all']);
        $HrPermission = Permission::create(['name' => 'edit salary']);

        $AdminRole = Role::where('name', 'super admin')->first();
        $HrRole = Role::where('name', 'hr')->first();

        $AdminRole->givePermissionTo($AdminPermission);
        $HrRole->givePermissionTo($HrPermission);

        
    }
}