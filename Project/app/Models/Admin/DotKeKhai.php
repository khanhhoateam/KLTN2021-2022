<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotKeKhai extends Model
{
    use HasFactory;

    public $table = "DotKeKhai";

    protected $fillable = [
        'ThoiGianBatDau',
        'ThoiGianKetThuc'
    ];
}
