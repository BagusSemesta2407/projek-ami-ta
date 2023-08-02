<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluasiDiriRequest extends FormRequest
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
            'data.*.status_ketercapaian' => [
                'required'
            ],
            'data.*.deskripsi_ketercapaian' => [
                'required',
            ],
            'data.*.bukti' => [
                'required',
                'url'
            ]
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'data.*.status_ketercapaian.in' => 'Status Tidak Ditemukan',
            'data.*.status_ketercapaian.required' => 'Status Wajib Diisi',
            'data.*.deskripsi_ketercapaian.required' => 'Deskripsi Ketercapaian Wajib Diisi',
            'data.*.bukti.required' => 'Bukti Wajib Diisi',
            'data.*.bukti.url' => 'Bukti Harus Diinput Dalam Bentuk LINK'
        ];
    }
}
