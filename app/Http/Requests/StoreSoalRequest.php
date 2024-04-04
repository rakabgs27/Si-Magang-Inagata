<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoalRequest extends FormRequest
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
            'divisi_id' => 'required|array|min:1',
            'judul_soal' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
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
            'divisi_id.required' => 'Divisi harus diisi.',
            'divisis.min' => 'Setidaknya satu divisi harus dipilih.',
            'judul_soal.required' => 'Judul soal harus diisi.',
            'judul_soal.max' => 'Judul soal tidak boleh lebih dari :max karakter.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'files.*.mimetypes' => 'File harus berupa salah satu dari jenis berikut: jpeg, png, gif, doc, docx, pdf, xls, xlsx, mp3, wav.',
        ];
    }
}
