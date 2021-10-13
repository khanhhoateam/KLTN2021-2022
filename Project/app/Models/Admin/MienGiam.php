<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MienGiam extends Model
{
    use HasFactory;

    public $table = 'LoaiMienGiam';

    protected $fillable = [
        'MaMienGiam	',
        'TenMienGiam',
        'DiemMienGiam',
        'TyLeMienGiam',
        'MaDot'
    ];
}
