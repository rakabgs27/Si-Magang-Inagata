<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNilaiWawancaraPendaftarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'nilai_wawancara' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages()
    {
        return [
            'pendaftar_id.required' => 'Pendaftar ID wajib diisi.',
            'pendaftar_id.exists' => 'Pendaftar ID tidak valid.',
            'nilai_wawancara.required' => 'Nilai wawancara wajib diisi.',
            'nilai_wawancara.numeric' => 'Nilai wawancara harus berupa angka.',
            'nilai_wawancara.min' => 'Nilai wawancara harus minimal 60.',
            'nilai_wawancara.max' => 'Nilai wawancara harus maksimal 100.',
        ];
    }
}
