<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietMienGiam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietMienGiam', function (Blueprint $table) {
            $table->id('IDMienGiam');
            $table->unsignedBigInteger('MaGiangVien');
            $table->foreign('MaGiangVien')->references('MaGiangVien')->on('giangvien')->onDelete('cascade');
            $table->datetime('ThoiGianBatDau');
            $table->datetime('ThoiGianKetThuc');
            $table->integer('TrangThai');
            $table->unsignedBigInteger('MaMienGiam');
            $table->foreign('MaMienGiam')->references('MaMienGiam')->on('loaimiengiam')->onDelete('cascade');
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
        Schema::dropIfExists('ChiTietMienGiam');
    }
}
