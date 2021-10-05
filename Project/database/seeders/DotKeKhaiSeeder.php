<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DotKeKhaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('DotKeKhai')->insert([
            'ThoiGianBatDau' => '2020-01-01 00:00:00',
            'ThoiGianKetThuc' => '2020-12-31 23:59:59',
        ]);

        DB::table('DotKeKhai')->insert([
            'ThoiGianBatDau' => '2021-01-01 00:00:00',
            'ThoiGianKetThuc' => '2021-12-31 23:59:59',
        ]);
    }
}
