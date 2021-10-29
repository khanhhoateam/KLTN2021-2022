<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHD extends Model
{
    use HasFactory;

    public $table = "ChiTietHoatDong";

    protected $fillable = [
        'MaHoatDong',
        'MaGiangVien',
        'GioNC',
        'MaVaiTro' 
    ];
}
