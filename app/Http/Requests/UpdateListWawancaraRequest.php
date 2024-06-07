<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListWawancaraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Pastikan user memiliki izin untuk melakukan update
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
            'mentor' => 'required|exists:divisi_mentors,id',
            'pendaftar' => 'required|exists:pendaftars,id',
            'deskripsi' => 'required|string|max:255',
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
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 255 karakter.',
            'tanggal_wawancara.required' => 'Tanggal wawancara harus diisi.',
            'tanggal_wawancara.date' => 'Tanggal wawancara harus berupa tanggal yang valid.',
        ];
    }
}
