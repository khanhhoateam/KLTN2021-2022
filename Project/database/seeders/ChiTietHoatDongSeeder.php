<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChiTietHoatDongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ChiTietHoatDong')->insert([
            'MaHoatDong' => '1',
            'MaGiangVien' => '1',
            'GioNC' => '720',
            'MaVaiTro' => '1',
        ]);
        DB::table('ChiTietHoatDong')->insert([
            'MaHoatDong' => '1',
            'MaGiangVien' => '2',
            'GioNC' => '240',
            'MaVaiTro' => '2',
        ]);
        DB::table('ChiTietHoatDong')->insert([
            'MaHoatDong' => '1',
            'MaGiangVien' => '3',
            'GioNC' => '240',
            'MaVaiTro' => '2',
        ]);

        DB::table('ChiTietHoatDong')->insert([
            'MaHoatDong' => '2',
            'MaGiangVien' => '1',
            'GioNC' => '630',
            'MaVaiTro' => '1',
        ]);

        DB::table('ChiTietHoatDong')->insert([
            'MaHoatDong' => '2',
            'MaGiangVien' => '2',
            'GioNC' => '270',
            'MaVaiTro' => '2',
        ]);

        DB::table('ChiTietHoatDong')->insert([
            'MaHoatDong' => '3',
            'MaGiangVien' => '1',
            'GioNC' => '700',
            'MaVaiTro' => '1',
        ]);
    }
}
