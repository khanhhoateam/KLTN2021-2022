<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MienGiamTam extends Model
{
    use HasFactory;

    public $table = "LoaiMienGiamTam";
    public $primaryKey = "MaMienGiam";
    
    protected $fillable = [
        'TenMienGiam',
        'DiemMienGiam',
        'TyLeMienGiam',
        'MaDot',
        'Active'
    ];
}
