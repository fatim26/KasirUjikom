<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatekaryawanRequest extends FormRequest
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
            'nip' => 'Required',
            'nik' => 'Required',
            'nama' => 'Required',
            'jenis_kelamin' => 'Required',
            'tempat_lahir' => 'Required',
            'tanggal_lahir' => 'Required',
            'telepon' => 'Required',
            'agama' => 'Required',
            'status_nikah' => 'Required',
            'foto' => 'Required',
        ];
    }

    public function messages(){
        return[
            'nip.required'=> "Data nip belum diisi",
            'nik.required'=> "Data nik belum diisi",
            'nama.required'=> "Data nama belum diisi",
            'jenis_kelamin.required'=> "Data jenis kelamin belum diisi",
            'tempat_lahir.required'=> "Data tempat lahir belum diisi",
            'tanggal_lahir.required'=> "Data tanggal lahir belum diisi",
            'telepon.required'=> "Data telepon belum diisi",
            'agama.required'=> "Data agama belum diisi",
            'status_nikah.required'=> "Data status nikah belum diisi",
            'foto.required'=> "Data foto belum diisi",
        ];
    }
}
