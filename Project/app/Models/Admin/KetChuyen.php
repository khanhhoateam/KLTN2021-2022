<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetChuyen extends Model
{
    use HasFactory;

    public $table = "KetChuyen";
    
    public $primaryKey = "IDKetChuyen";

    protected $fillable = [
        'IDGiangVien',
        'MaDot',
        'MaHoatDong',
        'DiemNC',
        'DiemDM',
        'DiemDu',
        'HSD'
    ];
    
}
