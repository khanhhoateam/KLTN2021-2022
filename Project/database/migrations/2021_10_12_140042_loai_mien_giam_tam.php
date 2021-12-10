<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoaiMienGiamTam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiMienGiamTam', function (Blueprint $table) {
            $table->id('MaMienGiam');
            $table->string('TenMienGiam');
            $table->integer('DiemMienGiam');
            $table->float('TyLeMienGiam', 3, 2);
            $table->unsignedBigInteger('MaDot');
            $table->integer('Active');
            $table->foreign('MaDot')->references('MaDot')->on('dotkekhai')->onDelete('cascade');
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
        Schema::dropIfExists('LoaiMienGiam');
    }
}
