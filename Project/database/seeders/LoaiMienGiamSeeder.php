<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoaiMienGiamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên tập sự',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '1',
            'MaDot' => '1'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên mới, năm nhất',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0.5',
            'MaDot' => '1'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên mới, năm hai',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0.7',
            'MaDot' => '1'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên được Trường cử đi học sau đại học: Thuộc diện tập trung',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '1',
            'MaDot' => '1'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên được Trường cử đi học sau đại học: Thuộc diện không tập trung',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0.5',
            'MaDot' => '1'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên được Trường cử đi học sau đại học: Trong thời gian học quá hạn',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0',
            'MaDot' => '1'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên nữ trong thời gian nuôi con dưới 12 tháng tuổi',
            'DiemMienGiam' => '73',
            'TyLeMienGiam' => '0',
            'MaDot' => '1'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên tập sự',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '1',
            'MaDot' => '2'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên mới, năm nhất',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0.5',
            'MaDot' => '2'
        ]);
        
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên mới, năm hai',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0.7',
            'MaDot' => '2'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên được Trường cử đi học sau đại học: Thuộc diện tập trung',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '1',
            'MaDot' => '2'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên được Trường cử đi học sau đại học: Thuộc diện không tập trung',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0.5',
            'MaDot' => '2'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên được Trường cử đi học sau đại học: Trong thời gian học quá hạn',
            'DiemMienGiam' => '0',
            'TyLeMienGiam' => '0',
            'MaDot' => '2'
        ]);
        DB::table('LoaiMienGiam')->insert([
            'TenMienGiam' => 'Giảng viên nữ trong thời gian nuôi con dưới 12 tháng tuổi',
            'DiemMienGiam' => '73',
            'TyLeMienGiam' => '0',
            'MaDot' => '2'
        ]);
    }
}
