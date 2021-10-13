<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoaiTam extends Model
{
    use HasFactory;

    public $table = "TheLoaiTam";
    
    protected $fillable = [
        'TenTheLoai',
        'DiemNC',
        'MaDot',
        'Active'
    ];
}
