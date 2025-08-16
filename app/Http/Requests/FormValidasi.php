<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidasi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'answers'                   => 'required|array',
            'answers.*.gejala_id'       => 'required|integer',
            'answers.*.adiksi_id'       => 'required|integer',
            'answers.*.cf_user'         => 'required|numeric',
            'answers.*.cf_pakar'        => 'required|numeric',
            'answers.*.cf_kombinasi'    => 'required|numeric',

            'pengguna'                  => 'required|array',
            'pengguna.nama'             => 'required|string|max:255',
            'pengguna.jenis_kelamin'    => 'required|string',
            'pengguna.umur'             => 'required|integer',
            'pengguna.prodi'            => 'nullable|string',
        ];
    }
}
