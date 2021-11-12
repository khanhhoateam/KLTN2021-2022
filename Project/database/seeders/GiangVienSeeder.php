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
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 2',
            'SDT' => '012345678',
            'Email' => 'giangvien2@iuh.com',
            'UserID' => '3',
            'MaHocHam' => '1',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 3',
            'SDT' => '012345678',
            'Email' => 'giangvien3@iuh.com',
            'UserID' => '4',
            'MaHocHam' => '1',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 4',
            'SDT' => '012345678',
            'Email' => 'giangvien4@iuh.com',
            'UserID' => '5',
            'MaHocHam' => '1',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 5',
            'SDT' => '012345678',
            'Email' => 'giangvien5@iuh.com',
            'UserID' => '6',
            'MaHocHam' => '9',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 6',
            'SDT' => '012345678',
            'Email' => 'giangvien6@iuh.com',
            'UserID' => '7',
            'MaHocHam' => '10',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 7',
            'SDT' => '012345678',
            'Email' => 'giangvien7@iuh.com',
            'UserID' => '8',
            'MaHocHam' => '11',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 8',
            'SDT' => '012345678',
            'Email' => 'giangvien8@iuh.com',
            'UserID' => '9',
            'MaHocHam' => '12',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 9',
            'SDT' => '012345678',
            'Email' => 'giangvien9@iuh.com',
            'UserID' => '10',
            'MaHocHam' => '13',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 10',
            'SDT' => '012345678',
            'Email' => 'giangvien10@iuh.com',
            'UserID' => '11',
            'MaHocHam' => '14',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 11',
            'SDT' => '012345678',
            'Email' => 'giangvien11@iuh.com',
            'UserID' => '12',
            'MaHocHam' => '8',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 12',
            'SDT' => '012345678',
            'Email' => 'giangvien12@iuh.com',
            'UserID' => '13',
            'MaHocHam' => '9',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 13',
            'SDT' => '012345678',
            'Email' => 'giangvien13@iuh.com',
            'UserID' => '14',
            'MaHocHam' => '10',
            'Active' => '1'
        ]);
        DB::table('GiangVien')->insert([
            'TenGiangVien' => 'Giảng viên 14',
            'SDT' => '012345678',
            'Email' => 'giangvien14@iuh.com',
            'UserID' => '15',
            'MaHocHam' => '11',
            'Active' => '1'
        ]);
    }
}
