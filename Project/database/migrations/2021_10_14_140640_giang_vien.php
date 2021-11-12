<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiangVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiangVien', function (Blueprint $table) {
            $table->id('MaGiangVien');
            $table->string('TenGiangVien');
            $table->string('SDT');
            $table->string('Email');
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('MaHocHam');
            $table->foreign('MaHocHam')->references('MaHocHam')->on('hocham')->onDelete('cascade');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->Integer('Active');
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
        Schema::dropIfExists('GiangVien');
    }
}
