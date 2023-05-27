<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstrumentRequest extends FormRequest
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
            'category_unit_id' => 'required',
            'name' => 'required',
            'status_standar' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'category_unit_id.required' => 'Kategori Unit wajib diisi',
            'name.required' => 'Pertanyaan Instrument wajib diisi',
            'status_standar.required' => 'Status Standar wajib diisi',
        ];
    }
}
