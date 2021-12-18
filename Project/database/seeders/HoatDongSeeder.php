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

        DB::table('HoatDong')->insert([
			'MaHoatDong' => '2',
            'MaTheLoai' => '3',
            'TenHD' => 'Hoạt động 2',
            'File' => '....',
            'TrangThai' => 'Đã duyệt',
			'HanSuDung' => '3',
            'MoTa' => 'Nghiên cứu phát triển một mô hình cách ly dao động tích cực với đặc tính độ cứng gần bằng không	',
            'GVKeKhai' => '3',
            'TieuDe' => '',
            'NamXuatBan' => '',
            'NhaXuatBan' => '',
            'TapChi' => '',
            'SoPhatHanh' => '',
            'ChuanDanhMuc' => '',
			'Diem' => '900',
        ]);

        DB::table('HoatDong')->insert([
			'MaHoatDong' => '3',
            'MaTheLoai' => '4',
            'TenHD' => 'Hoạt động ',
            'File' => '....',
            'TrangThai' => 'Đã duyệt',
			'HanSuDung' => '3',
            'MoTa' => 'Phát triển sản phẩm bánh quy không gluten từ hạt kê nảy mầm',
            'GVKeKhai' => '3',
            'TieuDe' => 'Phát triển sản phẩm bánh quy không gluten từ hạt kê nảy mầm',
            'NamXuatBan' => '2020',
            'NhaXuatBan' => 'NXB Trẻ',
            'TapChi' => 'Thanh niên',
            'SoPhatHanh' => 'SH03M',
            'ChuanDanhMuc' => 'SCIE',
			'Diem' => '700',
        ]);
    
    }
}
