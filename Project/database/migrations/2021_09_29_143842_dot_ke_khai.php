<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DotKeKhai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DotKeKhai', function (Blueprint $table) {
            $table->id('MaDot');
            $table->datetime('ThoiGianBatDau');
            $table->datetime('ThoiGianKetThuc');
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
        Schema::dropIfExists('DotKeKhai');
    }
}
