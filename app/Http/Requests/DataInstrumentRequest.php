<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules(): array
    {
        $rules =[
            'auditee_id' => 'required|unique:data_instruments,auditee_id',
            'auditor_id'    => 'different:auditor2_id|required|unique:data_instruments,auditor_id',
            'auditor2_id'   => 'required|different:auditor_id|unique:data_instruments,auditor_id',
            'category_unit_id'  => 'required',
            'dokumenStandar'=> 'required',
            'tanggal_audit'=> 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'auditee_id.required'   => 'Auditee Wajib Diisi',
            'auditee_id.unique'   => 'Sudah Ada Data Auditee Pada Data Sebelumnya',
            'auditor_id.required'   => 'Auditor 1 Wajib Diisi',
            'auditor2_id.required'  => 'Auditor 2 Wajib Diisi',
            'auditor_id.different'   => 'Auditor 1 Yang Dipilih Tidak Boleh Sama Dengan Auditor 2',
            'auditor2_id.different'  => 'Auditor 2 Yang Dipilih Tidak Boleh Sama Dengan Auditor 1',
            'auditor_id.unique'   => 'Sudah Ada Data Auditor 1 Pada Data Sebelumnya',
            'auditor2_id.unique'  => 'Sudah Ada Data Auditor 2 Pada Data Sebelumnya',
            'category_unit_id.required'  => 'Unit Wajib Diisi',
            'dokumenStandar.required'    => 'Dokumen Standar Wajib Diisi',
            'tanggal_audit.required'    => 'Tanggal Audit Wajib Diisi'
        ];

    }
}
