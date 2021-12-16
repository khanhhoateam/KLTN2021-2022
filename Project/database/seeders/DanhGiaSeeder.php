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
            'XepLoai' => 'Không Đạt',
            'DiemToiThieu' => '-1000',
            'DiemToiDa' => '0',
        ]);

        DB::table('DanhGia')->insert([
            'XepLoai' => 'Đạt',
            'DiemToiThieu' => '0',
            'DiemToiDa' => '50',
        ]);

        DB::table('DanhGia')->insert([
            'XepLoai' => 'Khá',
            'DiemToiThieu' => '50',
            'DiemToiDa' => '100',
        ]);

        DB::table('DanhGia')->insert([
            'XepLoai' => 'Giỏi',
            'DiemToiThieu' => '50',
            'DiemToiDa' => '200',
        ]);

        DB::table('DanhGia')->insert([
            'XepLoai' => 'Xuất Sắc',
            'DiemToiThieu' => '200',
            'DiemToiDa' => '2000',
        ]);


    }
}