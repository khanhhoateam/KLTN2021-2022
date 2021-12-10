<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('DanhGia')->insert([
            'MaDanhGia' => '1',
            'XepLoai' => 'Yếu',
            'DiemToiDa' => '0',
        ]);

        DB::table('DanhGia')->insert([
            'MaDanhGia' => '2',
            'XepLoai' => 'Khá',
            'DiemToiDa' => '50',
        ]);

        DB::table('DanhGia')->insert([
            'MaDanhGia' => '3',
            'XepLoai' => 'Giỏi',
            'DiemToiDa' => '200',
        ]);

    }
}