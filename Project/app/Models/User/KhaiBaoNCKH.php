<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhaiBaoNCKH extends Model
{
    use HasFactory;

    public $table = "HoatDong";
    
    protected $fillable = [
        'MaTheLoai',
        'TenHD',
        'File',
        'TrangThai',
        'HanSuDung',
        'MoTa',	
        'GVKeKhai',	
        'TieuDe',	
        'NamXuatBan',	
        'NhaSuatBan',	
        'TapChi',	
        'SoPhatHanh',	
        'ChuanDanhMuc'
    ];
}
