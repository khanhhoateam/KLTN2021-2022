<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotKeKhai extends Model
{
    use HasFactory;

    protected $table = 'DotKeKhai';
    
    protected $fillable = [
        'ThoiGianBatDau',
        'ThoiGianKetThuc'
    ];
}
