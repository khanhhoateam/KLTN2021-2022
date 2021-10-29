<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoatDong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoatDong', function (Blueprint $table) {
            $table->id('MaHoatDong');
            $table->unsignedBigInteger('MaTheLoai');
            $table->foreign('MaTheLoai')->references('MaTheLoai')->on('theloai')->onDelete('cascade');
            $table->string('TenHD', 100);
            $table->string('File');
            $table->string('TrangThai', 10);
            $table->integer('HanSuDung');
            $table->string('MoTa');
            $table->unsignedBigInteger('GVKeKhai');
            $table->foreign('GVKeKhai')->references('MaGiangVien')->on('giangvien')->onDelete('cascade');
            $table->string('TieuDe');
            $table->integer('NamXuatBan');
            $table->string('NhaSuatBan');
            $table->string('TapChi');
            $table->string('SoPhatHanh');
            $table->string('ChuanDanhMuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HoatDong');
    }
}
