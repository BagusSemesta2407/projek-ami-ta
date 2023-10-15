<?php

namespace App\Http\Requests;

use App\Models\Auditor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class DataInstrumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        $rules = [
            'kategori_audit' => 'required|in:Jurusan,Program Studi,Unit',
            'auditee_id' => 'required',
            'dokumenStandar' => 'required',
            'tanggal_audit' => 'required',
            'auditor_id' => 'required|different:auditor2_id',
            'auditor2_id' => 'required|different:auditor_id'
        ];

        // $rules['auditor_id'] = [
        //     'required',
        //     'exists:auditors,id',
        //     function ($attribute, $value, $fail) {
        //         $auditor=Auditor::findOrFail($value);
        //         if (
        //             $this->jurusan_id === $auditor->jurusan_id &&
        //             $this->program_studi_id === $auditor->program_studi_id
        //         ) {
        //             $fail('Data jurusan dan program studi ini sudah dimiliki oleh auditor lain.');
        //         }
        //     }
        // ];
        return $rules;
    }

    public function messages()
    {
        return [
            'kategori_audit.required' => 'Kategori Audit Wajib Diisi',
            'auditor_id.required_if' => 'The selected :attribute is required and must be different from the selected Jurusan/Program Studi.',
            'auditor2_id.required_if' => 'The selected :attribute is required and must be different from the selected Jurusan/Program Studi.',
            'auditee_id.required'   => 'Auditee Wajib Diisi',
            'auditor_id.required'   => 'Auditor 1 Wajib Diisi',
            'auditor2_id.required'  => 'Auditor 2 Wajib Diisi',
            'auditor_id.different'   => 'Auditor 1 Yang Dipilih Tidak Boleh Sama Dengan Auditor 2',
            'auditor2_id.different'  => 'Auditor 2 Yang Dipilih Tidak Boleh Sama Dengan Auditor 1',
            'dokumenStandar.required'    => 'Dokumen Standar Wajib Diisi',
            'tanggal_audit.required'    => 'Tanggal Audit Wajib Diisi'
        ];
    }

    public function attributes()
    {
        return [
            'auditor_id' => 'auditor',
            'auditor2_id' => 'auditor2',
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         $kategori_audit = $this->input('kategori_audit');
    //         $auditor_id = $this->input('auditor_id');
    //         $auditor2_id = $this->input('auditor2_id');
    //         $jurusan_id = $this->input('jurusan_id');
    //         $program_studi_id = $this->input('program_studi_id');

    //         $errorMessages = $validator->errors();

    //         if (($kategori_audit === 'Jurusan' || $kategori_audit === 'Program Studi') &&
    //             ($auditor_id === $jurusan_id || $auditor_id === $program_studi_id)
    //         ) {
    //             $errorMessages->add('auditor_id', 'Data Jurusan/Program Studi Yang Dimiliki oleh Auditor Tidak Boleh Sama Dengan Jurusan/Program Studi Yang Dipilih');
    //             $errorMessages->add('auditor2_id', ''); // Clear error message for auditor2_id
    //         }

    //         if (($kategori_audit === 'Jurusan' || $kategori_audit === 'Program Studi') &&
    //             ($auditor2_id === $jurusan_id || $auditor2_id === $program_studi_id)
    //         ) {
    //             $errorMessages->add('auditor2_id', 'Data Jurusan/Program Studi Yang Dimiliki oleh Auditor2 Tidak Boleh Sama Dengan Jurusan/Program Studi Yang Dipilih');
    //             $errorMessages->add('auditor_id', ''); // Clear error message for auditor_id
    //         }
    //     });
    // }
}
