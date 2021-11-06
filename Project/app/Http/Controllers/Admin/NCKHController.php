<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\NCKHServices;
use App\Http\Services\Admin\DotKeKhaiServices;

class NCKHController extends Controller
{
    public function __construct(NCKHServices $NCKHServices,DotKeKhaiServices $DotKeKhaiServices) {
        $this->NCKHServices = $NCKHServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
    }

    public function view() {
        return view('pages.admin.nghiencuukhoahoc.quanlynckh',[
            'title'=>'QUẢN LÝ NCKH'
        ]);

    }

}
