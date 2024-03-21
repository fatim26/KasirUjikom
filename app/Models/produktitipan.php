<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produktitipan extends Model
{
    use HasFactory;
    protected $table = 'produktitipan';
    protected $fillable = ['id','nama_produk','nama_supplier','harga_beli','harga_jual','stok','keterangan'];
}
