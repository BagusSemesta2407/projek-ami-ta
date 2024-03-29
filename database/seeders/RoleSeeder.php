<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'auditee',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'auditor',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'P4MP',
            'guard_name' => 'web',
        ]);
    }
}
