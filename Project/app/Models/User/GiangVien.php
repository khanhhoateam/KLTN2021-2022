<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;
    
    public $table = "GiangVien";
    
    protected $fillable = [
        'MaGiangVien',
        'TenGiangVien',
        'SDT',
        'Email',
        'UserID',
        'MaHocHam',
    ];
}
