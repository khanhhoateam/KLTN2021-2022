<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TheloaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TheLoai')->insert([
            'TenTheLoai' => 'Đề tài cấp Nhà nước',
            'DiemNC' => '1200',
            'MaDot' => '1',
        ]);

        DB::table('TheLoai')->insert([
            'TenTheLoai' => 'Đề tài NAFOSTED',
            'DiemNC' => '1000',
            'MaDot' => '1',
        ]);

        DB::table('TheLoai')->insert([
            'TenTheLoai' => 'Đề tài cấp Bộ và tương đương',
            'DiemNC' => '900',
            'MaDot' => '1',
        ]);

        DB::table('TheLoai')->insert([
            'TenTheLoai' => 'Đề tài cấp Trường',
            'DiemNC' => '700',
            'MaDot' => '1',
        ]);
    }
}
