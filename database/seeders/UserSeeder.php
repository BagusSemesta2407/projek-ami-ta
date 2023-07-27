<?php

namespace Database\Seeders;

use App\Models\User;
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
            'nip'=>'123456',
            'email' => 'semestabagus24@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('admin');
        $user = User::create([
            'name' => 'Superadmin',
            'nip'=> '098765',
            'email' => 'admin@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Auditee',
            'nip'=> '3465465',
            'email' => 'auditee@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('auditee');

        $user = User::create([
            'name' => 'Auditor',
            'nip'=> '1979487',
            'email' => 'auditor@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('auditor');

        $user = User::create([
            'name' => 'Kepala P4MP',
            'nip'=> '7639493',
            'email' => 'kepala@polsub.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('P4MP');
    }
}
