<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJawabanPendaftarRequest extends FormRequest
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
            'soal_pendaftar_id' => 'required|exists:soal_pendaftars,id',
            'link_jawaban' => 'required|url',
            'file_jawaban' => 'required|file|mimes:pdf,doc,docx',
        ];
    }

    public function messages()
    {
        return [
            'soal_pendaftar_id.required' => 'Soal pendaftar ID wajib diisi.',
            'soal_pendaftar_id.exists' => 'Soal pendaftar ID tidak valid.',
            'link_jawaban.url' => 'Link jawaban harus berupa URL yang valid.',
            'link_jawaban.required' => 'Link jawaban harus wajib diisi.',
            'file_jawaban.required' => 'Berkas jawaban harus wajib diisi.',
            'file_jawaban.file' => 'Berkas jawaban harus berupa file.',
            'file_jawaban.mimes' => 'Berkas jawaban harus berupa file dengan format: pdf, doc, docx.',
        ];
    }
}
