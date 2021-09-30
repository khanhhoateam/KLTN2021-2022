<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HocHamController extends Controller
{
    public function edit(){
        return view('admin.dinhmuchocham',[
            'title' => 'THIẾT LẬP ĐỊNH MỨC HỌC HÀM'
        ]);
    }

    public function store(Request $request){
        dd($request->input());
    }
}
