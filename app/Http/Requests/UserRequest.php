<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nip' => 'required|unique:users,nip|numeric',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nip.unique' => 'NIP Sudah Terdaftar',
            'nip.required' => 'NIP Wajib Diisi',
            'nip.numeric' => 'NIP Wajib Diisi Angka',
            // 'nip.max' => 'NIP Yang Diinpu Bisa Diinput Dalam 18 Karakter',
            // 'nip.min' => 'NIP Hanya Bisa Diinput Dalam 18 Karakter',
            'name.required' => 'Nama User Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Email Tidak Valid',
            'email.unique' => 'Email Sudah Terdaftar',
            'roles.required' => 'Role User Wajib Diisi',
        ];
    }
}
