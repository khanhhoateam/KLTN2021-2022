<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\GiangVien;
class DotKeKhai extends Model
{
    use HasFactory;

    public $table = "DotKeKhai";

    public $primaryKey = "MaDot";

    protected $fillable = [
        'ThoiGianBatDau',
        'ThoiGianKetThuc',
        'Enable'
    ];

    public function HocHam()
    {
        return $this->hasMany(HocHam::class, 'MaDot', 'MaDot');
    }

    public function GiangVien()
    {
        return $this->hasManyThrough(
            GiangVien::class,
            HocHam::class,
            'MaDot', 
            'MaHocHam', 
            'MaDot', 
            'MaHocHam' 
        );
    }
    public function MienGiam() 
    {
        return $this->hasMany(MienGiam::class, 'MaDot', 'MaDot');
    }
}
