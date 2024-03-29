<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditeeRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama User Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Email Tidak Valid',
            'email.unique' => 'Email Sudah Terdaftar',
        ];
    }
}
