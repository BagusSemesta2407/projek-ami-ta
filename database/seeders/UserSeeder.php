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
        $user = User::create([
            'name' => 'Bagus Semesta',
            'email' => 'semestabagus24@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        
        $user->assignRole('admin');
        $user = User::create([
            'name' => 'Superadmin',
            'email' => 'admin@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Auditee',
            'email' => 'auditee@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('auditee');

        $user = User::create([
            'name' => 'Auditor',
            'email' => 'auditor@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('auditor');
    }
}
