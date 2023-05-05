<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $superadmin->assignRole('superadmin');

        $auditee = User::create([
            'name' => 'Auditee',
            'email' => 'auditee@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $auditee->assignRole('auditee');

        $auditor = User::create([
            'name' => 'Auditor',
            'email' => 'auditor@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $auditor->assignRole('auditor');
    }
}
