<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VaiTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('VaiTro')->insert([
            'TenVaiTro' => 'Tác giả',
            'TiLe' => '0.4'
        ]);
        DB::table('VaiTro')->insert([
            'TenVaiTro' => 'Người tham gia',
            'TiLe' => '0.6'
        ]);
    }
}
