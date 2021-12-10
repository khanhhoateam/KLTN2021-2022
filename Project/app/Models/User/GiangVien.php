<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HocHam;

class GiangVien extends Model
{
    use HasFactory;
    
    public $table = "GiangVien";
    
    protected $primaryKey = 'MaGiangVien';

    protected $fillable = [
        'MaGiangVien',
        'TenGiangVien',
        'SDT',
        'Email',
        'UserID',
        'MaHocHam',
    ];

    public function HocHam()
    {
        return $this->hasMany(HocHam::class, 'MaHocHam', 'MaHocHam');
    }
}
