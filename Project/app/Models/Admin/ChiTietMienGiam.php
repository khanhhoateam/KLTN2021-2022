<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietMienGiam extends Model
{
    use HasFactory;

    public $table = "ChiTietMienGiam";

    public $primaryKey = "IDMienGiam";

    protected $fillable = [
        'MaGiangVien',
        'ThoiGianBatDau',
        'ThoiGianKetThuc',
        'TrangThai',
        'MaMienGiam'
    ];
}
