<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TongKetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TongKet')->insert([
            'MaGiangVien' => '1',
            'MaDot' => '1',
            'DiemDM' => '700',
            'DiemDanhGia' => '0',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '2',
            'MaDot' => '1',
            'DiemDM' => '700',
            'DiemDanhGia' => '100',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '3',
            'MaDot' => '1',
            'DiemDM' => '700',
            'DiemDanhGia' => '200',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '4',
            'MaDot' => '2',
            'DiemDM' => '700',
            'DiemDanhGia' => '-50',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '5',
            'MaDot' => '2',
            'DiemDM' => '660',
            'DiemDanhGia' => '-50',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '6',
            'MaDot' => '2',
            'DiemDM' => '660',
            'DiemDanhGia' => '0',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '7',
            'MaDot' => '2',
            'DiemDM' => '630',
            'DiemDanhGia' => '50',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '8',
            'MaDot' => '2',
            'DiemDM' => '630',
            'DiemDanhGia' => '100',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '9',
            'MaDot' => '2',
            'DiemDM' => '590',
            'DiemDanhGia' => '150',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '10',
            'MaDot' => '2',
            'DiemDM' => '590',
            'DiemDanhGia' => '150',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '11',
            'MaDot' => '2',
            'DiemDM' => '700',
            'DiemDanhGia' => '200',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '12',
            'MaDot' => '2',
            'DiemDM' => '660',
            'DiemDanhGia' => '250',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '13',
            'MaDot' => '2',
            'DiemDM' => '660',
            'DiemDanhGia' => '300',
            'Enable' => '1'
        ]);

        DB::table('TongKet')->insert([
            'MaGiangVien' => '14',
            'MaDot' => '2',
            'DiemDM' => '630',
            'DiemDanhGia' => '0',
            'Enable' => '1'
        ]);

    }
}
