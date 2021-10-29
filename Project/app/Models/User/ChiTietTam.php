<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietTam extends Model
{
    use HasFactory;
    public $table = "ChiTietTam";
    
    protected $fillable = [
        'MaGiangVien',
        'TenGiangVien',
        'MaVaiTro',
        'Enable'
    ];
}
