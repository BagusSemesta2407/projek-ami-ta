<?php

namespace Database\Seeders;

use App\Models\TypeDokumenMutuStandar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeDokumenStandarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeDokumenMutuStandar::create([
            'name'  => 'Standar Nasional Pendidikan'
        ]);
        TypeDokumenMutuStandar::create([
            'name'  => 'Standar Nasional Penelitian'
        ]);
        TypeDokumenMutuStandar::create([
            'name'  => 'Standar Nasional Pengabdian Kepada Masyarakat'
        ]);
        TypeDokumenMutuStandar::create([
            'name'  => 'Standar Turunan SPMI'
        ]);
        TypeDokumenMutuStandar::create([
            'name'  => 'Prosedur Operasional Standar'
        ]);
        TypeDokumenMutuStandar::create([
            'name'  => 'Peraturan Direktur Politeknik Negeri Subang'
        ]);
    }
}
