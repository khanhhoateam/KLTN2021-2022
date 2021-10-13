<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;

    public $table = "TheLoai";
    
    protected $fillable = [
        'TenTheLoai',
        'DiemNC',
        'MaDot',
    ];
}
