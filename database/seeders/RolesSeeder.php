<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $AdminRole = Role::updateOrCreate(['name' => 'super admin']);
        $HrRole = Role::updateOrCreate(['name' => 'hr']);

        $admin = User::where('email', 'admin@gmail.com')->first();
        $hr = User::where('email', 'hr@gmail.com')->first();

        $admin->assignRole($AdminRole);
        $hr->assignRole($HrRole);
    }
}
