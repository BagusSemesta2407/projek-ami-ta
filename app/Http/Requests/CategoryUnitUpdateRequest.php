<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUnitUpdateRequest extends FormRequest
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
            'kepala'=> 'required',
            'kategori_audit'    => 'required',
            'user_id'=> 'required'
            // 'email' => ['required|email|unique:users,email' ,
            //     Rule::unique('users')->ignore($this->categoryUnit->user)
            // ]
            // 'email' =>'required|email|unique:users,email,' . $this->category_unit->user->id,
        ];
        

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Kategori Unit Wajib Diisi',
            'kepala.required' => 'Nama Kepala Unit Wajib Diisi',
            'kategori_audit.required' => 'Nama Kategori Audit Wajib Diisi',
            'user_id.required'=>'Auditee Wajib Diisi' 
            // 'email.required' => 'Email Wajib Diisi',
            // 'email.email' => 'Email Tidak Valid',
            // 'email.unique' => 'Email Sudah Terdaftar',
        ];
    }
}
