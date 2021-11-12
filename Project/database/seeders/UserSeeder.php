<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nhân viên 1',
            'email' => 'nhanvien1@gmail.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '0',
        ]);

        DB::table('users')->insert([
            'name' => 'Giảng viên 1',
            'email' => 'giangvien1@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Giảng viên 2',
            'email' => 'giangvien2@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Giảng viên 3',
            'email' => 'giangvien3@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 4',
            'email' => 'giangvien4@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 5',
            'email' => 'giangvien5@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 6',
            'email' => 'giangvien6@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 7',
            'email' => 'giangvien7@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 8',
            'email' => 'giangvien8@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 9',
            'email' => 'giangvien9@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 10',
            'email' => 'giangvien10@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 11',
            'email' => 'giangvien11@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 12',
            'email' => 'giangvien12@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 13',
            'email' => 'giangvien13@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Giảng viên 14',
            'email' => 'giangvien14@iuh.com',
            'password' => '$2y$10$XES6eQ5RTHbmGyDSIopKw.GGgKGIKWYbsdCMb1LlkdpudWFc1Vc/K',
            'level' => '1',
        ]);
    }
}
