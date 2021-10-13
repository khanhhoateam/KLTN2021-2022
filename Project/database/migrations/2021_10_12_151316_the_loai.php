<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TheLoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TheLoai', function (Blueprint $table) {
            $table->id('MaTheLoai');
            $table->string('TenTheLoai');
            $table->integer('DiemNC');
            $table->unsignedBigInteger('MaDot');
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
        Schema::dropIfExists('TheLoai');
    }
}
