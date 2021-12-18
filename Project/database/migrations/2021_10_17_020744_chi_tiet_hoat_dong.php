<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietHoatDong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietHoatDong', function (Blueprint $table) {
            $table->id('IDHoatDong');
            $table->unsignedBigInteger('MaHoatDong');
            $table->foreign('MaHoatDong')->references('MaHoatDong')->on('hoatdong')->onDelete('cascade');
            $table->unsignedBigInteger('MaGiangVien');
            $table->foreign('MaGiangVien')->references('MaGiangVien')->on('giangvien')->onDelete('cascade');
            $table->integer('GioNC');
            $table->unsignedBigInteger('MaVaiTro');
            $table->foreign('MaVaiTro')->references('MaVaiTro')->on('vaitro')->onDelete('cascade');
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
        Schema::dropIfExists('ChiTietHoatDong');
    }
}
