<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class StorejenisRequest extends FormRequest
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
            'nama_jenis' => 'Required',
            'kategori_id' => 'Required',
        ];
    }
    public function messages(){
        return[
            'nama_jenis.required'=> "Data nama jenis belum diisi",
            'kategori_id.required'=> "Data kategori belum diisi",
        ];
    }
}
