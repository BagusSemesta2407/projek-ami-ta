<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstrumentAuditeeRequest extends FormRequest
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
            // 'answer'    => 'required',
            'reason'    => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            // 'answer.required'   => 'Opsi Belum Dipilih',
            'reason.required'   => 'Keterangan Wajib Diisi',
        ];
    }
}
