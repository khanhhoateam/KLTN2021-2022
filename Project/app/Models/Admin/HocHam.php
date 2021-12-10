<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\GiangVien;

class HocHam extends Model
{
    use HasFactory;

    public $table = "HocHam";
    
    public $primaryKey = "MaHocHam";

    protected $fillable = [
        'TenHocHam',
        'DiemDMHH',
        'MaDot'
    ];

    public function DotKeKhai()
    {
        return $this->belongsTo(DotKeKhai::class, 'MaDot', 'MaDot');
    }

    public function GiangVien()
    {
        return $this->hasMany(GiangVien::class, 'MaHocHam', 'MaHocHam');
    }
}
