<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramStudiRequest extends FormRequest
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
            'jurusan_id' => 'required',
            'jenjang_id' => 'required',
            'name' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'jurusan_id.required' => 'Jurusan Wajib Dipilih',
            'jenjang_id.required' => 'Jenjang Wajib Diisi',
            'name.required' => 'Nama Program Studi Wajib Diisi',
        ];
    }
}
