<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatepemesananRequest extends FormRequest
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
            'meja_id' => 'Required',
            'tanggal_pemesanan' => 'Required',
            'jam_mulai' => 'Required',
            'jam_selesai' => 'Required',
            'nama_pemesan' => 'Required',
            'jumlah_pelanggan' => 'Required',
        ];
    }
    
    public function messages(){
        return[
            'meja_id.required'=> "Data meja_id belum diisi",
            'tanggal_pemesanan.required'=> "Data tanggal_pemesanan belum diisi",
            'jam_mulai'.'required' => "Data jam_muali belum diisi",
            'jam_selesai','required' => "Data jam_selesai belum diisi",
            'nama_pemesan','required '=> "Data nama_pemesan belum diisi",
            'jumlah_pelanggan','require'=> "Data jumlah_pelanggan belum diisi",
        ];
    }
}
