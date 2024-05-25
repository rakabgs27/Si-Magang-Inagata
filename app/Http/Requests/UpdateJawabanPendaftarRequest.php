<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJawabanPendaftarRequest extends FormRequest
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
            'link_jawaban' => 'nullable|url',
            'file_jawaban' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ];
    }
}
