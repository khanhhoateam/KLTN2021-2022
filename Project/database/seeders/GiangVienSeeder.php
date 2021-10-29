<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GiangVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 1',
            'SDT' => '012345678',
            'Email' => 'giangvien1@iuh.com',
            'UserID' => '2',
            'MaHocHam' => '1',
            
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 2',
            'SDT' => '012345678',
            'Email' => 'giangvien2@iuh.com',
            'UserID' => '3',
            'MaHocHam' => '1',
            
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 3',
            'SDT' => '012345678',
            'Email' => 'giangvien3@iuh.com',
            'UserID' => '4',
            'MaHocHam' => '1',
            
        ]);
    }
}
