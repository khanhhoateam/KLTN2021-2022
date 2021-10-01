<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\HocHamService;

class HocHamController extends Controller
{
    protected $HocHamService;

    public function __construct(HocHamService $HocHamService){
        $this->HocHamService = $HocHamService;
    }

    public function create(){
        return view('admin.dinhmuchocham',[
        'title' => 'THIẾT LẬP ĐỊNH MỨC HỌC HÀM',
        'tenhocham' => $this->HocHamService->getInformation()
        ]); 
    }

    public function store(Request $request){ 
        $request->request->add(['dot'=>'3']);
        $result = $this->HocHamService->store($request);
        return redirect()->back(); 
    } 

    public function delete(Request $request){ 
        $result = $this->HocHamService->delete($request);
        return redirect()->back(); 
    } 

}