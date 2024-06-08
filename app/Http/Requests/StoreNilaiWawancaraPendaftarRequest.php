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
            'nilai_wawancara' => 'required|in:Kurang,Cukup,Memuaskan,Baik Sekali,Luar Biasa',
        ];
    }

    public function messages()
    {
        return [
            'pendaftar_id.required' => 'Pendaftar ID wajib diisi.',
            'pendaftar_id.exists' => 'Pendaftar ID tidak valid.',
            'nilai_wawancara.required' => 'Nilai wawancara wajib diisi.',
            'nilai_wawancara.in' => 'Nilai wawancara harus diantara: Kurang, Cukup, Memuaskan, Baik Sekali, Luar Biasa.',
        ];
    }
}
