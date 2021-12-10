<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;

    public $table = "VaiTro";
    
    protected $fillable = [
        'MaVaiTro',
        'TenVaiTro',
        'TiLe',
    ];
}
