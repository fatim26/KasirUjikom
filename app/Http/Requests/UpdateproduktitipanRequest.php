<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateproduktitipanRequest extends FormRequest
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
            'nama_produk' => 'Required',
            'nama_supplier' => 'Required',
            'harga_beli' => 'Required',
            'harga_jual' => 'Required',
            'stok' => 'Required',
            'keterangan' => 'Required',
        ];
    }

    public function messages(){
        return[
            'nama_produk.required'=> "Data nama_produk belum diisi",
            'nama_supplier.required'=> "Data nama_suppliier belum diisi",
            'harga_beli'.'required' => "Data harga_beli belum diisi",
            'harga_jual','required' => "Data harga_jual belum diisi",
            'stok','required '=> "Data stok belum diisi",
            'keterangan','require'=> "Data keterangan belum diisi",
        ];
    } 
}
