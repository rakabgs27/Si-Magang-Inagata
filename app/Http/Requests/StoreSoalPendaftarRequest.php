<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoalPendaftarRequest extends FormRequest
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
            'pendaftar_id' => 'required',
            'soal_id' => 'required',
            'deskripsi_tugas' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'pendaftar_id.required' => 'Pilih pendaftar terlebih dahulu.',
            'pendaftar_id.exists' => 'Pendaftar yang dipilih tidak valid.',
            'soal_id.required' => 'Pilih setidaknya satu soal.',
            'soal_id.*.exists' => 'Salah satu soal yang dipilih tidak valid.',
            'deskripsi_tugas.required' => 'Deskripsi soal wajib diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid.',
            'tanggal_akhir.required' => 'Tanggal akhir wajib diisi.',
            'tanggal_akhir.date' => 'Format tanggal akhir tidak valid.',
            'tanggal_akhir.after' => 'Tanggal akhir harus setelah tanggal mulai.',
        ];
    }
}
