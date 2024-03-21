<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatemenuRequest extends FormRequest
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
            'nama_menu' => 'Required',
            'harga' => 'Required',
            'image' => 'Required',
            'deskripsi' => 'Required',
            'jenis_id' => 'Required',
    
        ];
    }

    public function messages(){
        return[
            'nama_menu.required'=> "Data nama menu belum diisi",
            'harga.required'=> "Data harga belum diisi",
            'image'.'required' => "Data image belum diisi",
            'deskripsi','required' => "Data deskripsi belum diisi",
            'jenis_id','required '=> "Data jenis_id belum diisi",
        ];
    }
}

    
