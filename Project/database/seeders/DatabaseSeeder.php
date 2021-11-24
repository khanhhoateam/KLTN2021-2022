<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DotKeKhaiSeeder::class,
            HocHamSeeder::class,
            TheLoaiSeeder::class,
            GiangVienSeeder::class,
            VaiTroSeeder::Class,
            HoatDongSeeder::Class,
            ChiTietHoatDongSeeder::Class,
            TongKetSeeder::Class, 
            LoaiMienGiamSeeder::Class,
            ChiTietMienGiamSeeder::Class
        ]);
    }
}
