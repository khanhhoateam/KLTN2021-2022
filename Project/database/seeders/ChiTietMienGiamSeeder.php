<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChiTietMienGiamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ChiTietMienGiam')->insert([
            'MaGiangVien' => '1',
            'ThoiGianBatDau' => '2020-01-01',
            'ThoiGianKetThuc' => '2020-12-31',
            'TrangThai' => '1',
            'MaMienGiam' => '1'
        ]);
        DB::table('ChiTietMienGiam')->insert([
            'MaGiangVien' => '2',
            'ThoiGianBatDau' => '2020-01-01',
            'ThoiGianKetThuc' => '2020-12-31',
            'TrangThai' => '1',
            'MaMienGiam' => '2'
        ]);
        DB::table('ChiTietMienGiam')->insert([
            'MaGiangVien' => '3',
            'ThoiGianBatDau' => '2020-01-01',
            'ThoiGianKetThuc' => '2020-12-31',
            'TrangThai' => '1',
            'MaMienGiam' => '3'
        ]);
    }
}
