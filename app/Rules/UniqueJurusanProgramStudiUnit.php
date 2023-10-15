<?php

namespace App\Rules;

use App\Models\Auditor;
use App\Models\DataInstrument;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueJurusanProgramStudiUnit implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Ambil nilai dari form
        $jurusan = request()->input('jurusan');
        $programStudi = request()->input('program_studi');
        $unit = request()->input('unit');

        // Cek apakah data jurusan, program studi, dan unit yang dipilih ada di tabel Auditor
        $isDuplicateAuditor = Auditor::where('jurusan', $jurusan)
            ->where('program_studi', $programStudi)
            ->where('unit', $unit)
            ->exists();

        // Cek apakah data jurusan, program studi, dan unit yang dipilih ada di tabel DataInstrument
        $isDuplicateDataInstrument = DataInstrument::where('jurusan', $jurusan)
            ->where('program_studi', $programStudi)
            ->where('unit', $unit)
            ->exists();

        // Jika ada data yang sama di tabel Auditor atau DataInstrument, return false (tidak valid)
        return !$isDuplicateAuditor && !$isDuplicateDataInstrument;
    }
}
