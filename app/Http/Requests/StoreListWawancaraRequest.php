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
            'deskripsi' => 'nullable|string',
            'tanggal_wawancara' => 'required|date',
        ];
    }
}
