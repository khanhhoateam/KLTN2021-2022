<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TongKet extends Model
{
    use HasFactory;

    public $table = "TongKet";
    
    public $primaryKey = "IDTongKet";

    protected $fillable = [
        'MaGiangVien',
        'MaDot',
        'DiemDM',
        'DiemDanhGia',
        'Enable'
    ];
}
