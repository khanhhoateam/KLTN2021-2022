<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hochamtam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HocHamTam', function (Blueprint $table) {
            $table->id('MaHocHam');
            $table->string('TenHocHam');
            $table->integer('DiemDMHH');
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
        Schema::dropIfExists('HocHamTam');
    }
}
