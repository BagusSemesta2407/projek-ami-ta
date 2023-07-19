<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DokumenStandarRequest extends FormRequest
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
            'type_dokumen_mutu_standar_id' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'type_dokumen_mutu_standar_id.required' => 'Type Dokumen Wajib Diisi',
        ];
    }
}
