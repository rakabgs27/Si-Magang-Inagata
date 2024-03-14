<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDivisiMentorRequest extends FormRequest
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
            'users' => 'required',
            'divisis' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'users.required' => 'Setidaknya satu mentor harus dipilih.',
            'divisis.required' => 'Setidaknya satu divisi harus dipilih.',
            'divisis.array' => 'Input divisi harus dalam bentuk array.',
            'divisis.min' => 'Setidaknya satu divisi harus dipilih.',
        ];
    }
}
