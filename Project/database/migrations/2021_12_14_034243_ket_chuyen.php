<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KetChuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KetChuyen', function (Blueprint $table) {
            $table->id('IDKetChuyen');
            $table->unsignedBigInteger('IDGiangVien');
            $table->foreign('IDGiangVien')->references('MaGiangVien')->on('giangvien')->onDelete('cascade');
            $table->unsignedBigInteger('MaDot');
            $table->foreign('MaDot')->references('MaDot')->on('dotkekhai')->onDelete('cascade');
            $table->unsignedBigInteger('MaHoatDong');
            $table->foreign('MaHoatDong')->references('MaHoatDong')->on('hoatdong')->onDelete('cascade');
            $table->integer('DiemNC');
            $table->integer('DiemDM');
            $table->integer('DiemDu');
            $table->integer('HSD');
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
        Schema::dropIfExists('KetChuyen');
    }
}
