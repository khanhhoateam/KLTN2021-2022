<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HoatDongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('HoatDong')->insert([
			'MaHoatDong' => '1',
            'MaTheLoai' => '1',
            'TenHD' => 'Bài báo nghiên cứu vi sinh',
            'File' => '....',
            'TrangThai' => 'Đã duyệt',
			'HanSuDung' => '3',
            'MoTa' => 'ứng dụng vi sinh vào thực phẩm đóng hộp',
            'GVKeKhai' => '1',
            'TieuDe' => 'Vi sinh vật và thực phẩm',
            'NamXuatBan' => '2020',
            'NhaXuatBan' => 'NXB Trẻ',
            'TapChi' => 'Thanh niên',
            'SoPhatHanh' => 'SH01X',
            'ChuanDanhMuc' => 'SCIE',
			'Diem' => '1200',
        ]);
    
    }
}
