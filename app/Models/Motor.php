<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'plat_nomor', 'nama_motor', 'merk', 'warna', 'tahun_kendaraan', 'no_mesin', 'no_rangka', 'modal', 'harga_beli', 'biaya_perbaikan', 'cover'
    ];
}