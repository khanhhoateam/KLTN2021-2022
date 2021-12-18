<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocHamTam extends Model
{
    use HasFactory;

    public $table = "HocHamTam";
    
    public $primaryKey = "MaHocHam";
    
    protected $fillable = [
        'TenHocHam',
        'DiemDMHH',
        'MaDot',
        'Active'
    ];
}
