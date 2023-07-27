<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditorUpdateRequest extends FormRequest
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
        $rules = [
            'user_id'=>'required',
            'jabatan'=> 'required',
            'tugas'=> 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'user_id.required'=>'Auditor Wajib Diisi',
            'jabatan.required'=> 'Jabatan Wajib Diisi',
            'tugas.required' => 'Tugas Auditor Wajib Diisi'
        ];
    }
}
