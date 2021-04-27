<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penjual extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_penjual', 'alamat', 'no_hp', 'status', 'motor_id'
    ];


    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }
}