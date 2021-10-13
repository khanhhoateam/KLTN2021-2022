<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HocHamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('HocHam')->insert([
            'TenHocHam' => 'Giáo sư',
            'DiemDMHH' => '700',
            'MaDot' => '1',
        ]);

        DB::table('HocHam')->insert([
            'TenHocHam' => 'Phó giáo sư',
            'DiemDMHH' => '660',
            'MaDot' => '1',
        ]);

        DB::table('HocHam')->insert([
            'TenHocHam' => 'Giảng viên cao cấp',
            'DiemDMHH' => '660',
            'MaDot' => '1',
        ]);

        DB::table('HocHam')->insert([
            'TenHocHam' => 'Tiến sĩ',
            'DiemDMHH' => '630',
            'MaDot' => '1',
        ]);

        DB::table('HocHam')->insert([
            'TenHocHam' => 'Giảng viên chính',
            'DiemDMHH' => '630',
            'MaDot' => '1',
        ]);

        DB::table('HocHam')->insert([
            'TenHocHam' => 'Thạc sĩ',
            'DiemDMHH' => '590',
            'MaDot' => '1',
        ]);

        DB::table('HocHam')->insert([
            'TenHocHam' => 'Giảng viên',
            'DiemDMHH' => '590',
            'MaDot' => '1',
        ]);
    }
}
