<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietTam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietTam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaGiangVien');
            $table->foreign('MaGiangVien')->references('MaGiangVien')->on('giangvien')->onDelete('cascade');
            $table->string('TenGiangVien');
            $table->unsignedBigInteger('MaVaiTro');
            $table->foreign('MaVaiTro')->references('MaVaiTro')->on('vaitro')->onDelete('cascade');
            $table->Integer('Enable');
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
        Schema::dropIfExists('ChiTietTam');
    }
}
