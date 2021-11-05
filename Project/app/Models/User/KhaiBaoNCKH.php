<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhaiBaoNCKH extends Model
{
    use HasFactory;

    public $table = "HoatDong";
    
    protected $primaryKey = 'MaHoatDong';
    
    protected $fillable = [
        'MaHoatDong',
        'MaTheLoai',
        'TenHD',
        'File',
        'TrangThai',
        'HanSuDung',
        'MoTa',	
        'GVKeKhai',	
        'TieuDe',	
        'NamXuatBan',	
        'NhaXuatBan',	
        'TapChi',	
        'SoPhatHanh',	
        'ChuanDanhMuc',
        'Diem'
    ];

    public function ChiTietHD()
    {
        return $this->hasMany(ChiTietHD::class, 'MaHoatDong', 'MaHoatDong');
    }
}
