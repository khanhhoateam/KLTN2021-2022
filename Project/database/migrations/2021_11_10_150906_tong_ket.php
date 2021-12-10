<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TongKet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TongKet', function (Blueprint $table) {
            $table->id('IDTongKet');
            $table->unsignedBigInteger('MaGiangVien');
            $table->foreign('MaGiangVien')->references('MaGiangVien')->on('giangvien')->onDelete('cascade');
            $table->unsignedBigInteger('MaDot');
            $table->foreign('MaDot')->references('MaDot')->on('dotkekhai')->onDelete('cascade');
            $table->integer('DiemDM');
            $table->integer('DiemDanhGia');
            $table->integer('Enable');
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
        Schema::dropIfExists('TongKet');
    }
}
