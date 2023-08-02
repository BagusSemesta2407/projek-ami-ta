<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JurusanRequest extends FormRequest
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
            'name' => 'required',
            // 'user_id' => 'required|unique:jurusans,user_id'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Jurusan Wajib Diisi',
            // 'user_id.required' => 'Kepala Jurusan Wajib Diisi',
            // 'user_id.unique' => 'Sudah Ada Data Kepala Jurusan'
        ];
    }
}
