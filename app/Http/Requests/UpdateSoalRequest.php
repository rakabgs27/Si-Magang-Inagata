<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSoalRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'divisi_id' => 'nullable|exists:divisis,id', 
            'judul_soal' => 'required|string|max:255',
            'deskripsi_soal' => 'nullable|string',
            'files.*' => 'nullable|file|mimetypes:image/jpeg,image/png,image/gif,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,audio/mpeg,audio/wav',
            'tanggal_upload' => 'required|date',
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
            'divisi_id.exists' => 'Divisi tidak valid atau tidak dapat diubah.',
            'judul_soal.required' => 'Judul soal harus diisi.',
            'judul_soal.max' => 'Judul soal tidak boleh lebih dari :max karakter.',
            'deskripsi_soal.string' => 'Deskripsi harus berupa teks.',
            'files.*.mimetypes' => 'File harus berupa salah satu dari jenis berikut: jpeg, png, gif, doc, docx, pdf, xls, xlsx, mp3,wav.',
            'files.*.file' => 'Pastikan mengunggah file yang valid.',
            'user_id.required' => 'User tidak dapat diubah dalam update ini.',
            'user_id.exists' => 'User tidak valid atau tidak dapat diubah.',
            'tanggal_upload.required' => 'Tanggal upload tidak dapat diubah dalam update ini.',
            'tanggal_upload.date' => 'Format tanggal tidak valid.'
        ];
    }
}
