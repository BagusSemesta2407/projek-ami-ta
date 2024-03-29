<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PpppmpUpdateRequest extends FormRequest
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
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->ppppmp->user->id)],
            'jabatan'=> 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Email Harus Valid',
            'email.unique' => 'Email Sudah Terdaftar',
            'jabatan.required'=> 'Jabatan Wajib Diisi',
        ];
    }
}
