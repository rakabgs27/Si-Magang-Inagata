<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListWawancaraRequest extends FormRequest
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
            'divisi' => 'required|exists:divisis,id',
            'mentor' => 'required|exists:users,id',
            'pendaftar' => 'required|exists:pendaftars,id',
            'deskripsi' => 'required|string',
            'tanggal_wawancara' => 'required|date',
        ];
    }

    /**
     * Get the custom messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'divisi.required' => 'Divisi harus dipilih.',
            'divisi.exists' => 'Divisi yang dipilih tidak valid.',
            'mentor.required' => 'Mentor harus dipilih.',
            'mentor.exists' => 'Mentor yang dipilih tidak valid.',
            'pendaftar.required' => 'Pendaftar harus dipilih.',
            'pendaftar.exists' => 'Pendaftar yang dipilih tidak valid.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'tanggal_wawancara.required' => 'Tanggal wawancara harus diisi.',
            'tanggal_wawancara.date' => 'Tanggal wawancara harus berupa tanggal yang valid.',
        ];
    }
}
