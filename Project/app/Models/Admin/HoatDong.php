<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoatDong extends Model
{
    use HasFactory;

    public $table = "HoatDong";
    
    protected $fillable = [
        'MaHoatDong',
        'TenHoatDong',
        'TrangThai',
        'HanSuDung',
        'GiangVienKeKhai'
    ];
}
