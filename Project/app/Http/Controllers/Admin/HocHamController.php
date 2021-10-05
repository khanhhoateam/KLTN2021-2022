<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\HocHamServices;

class HocHamController extends Controller
{
    public function __construct(HocHamServices $HocHamServices) {
        $this->HocHamServices = $HocHamServices;
    } 

    public function create() {
        if(!($this->HocHamServices->temporary_save_list())->isEmpty()) {
            $datatam = $this->HocHamServices->temporary_save_list();
        }      
        else{
            $datatam = array([]);
        } 
        return view('admin.hocham', [
            'title'=>'Thiết Lập Định Mức Học Hàm',
            'madotmoi'=>'2',
            'madotcu'=>'1',
            'hocham'=> $this->HocHamServices->list(1),
            'bangtam'=> $datatam
        ]);
    }
    
    public function store( Request $request ) {
        $result = $this->HocHamServices->store($request);
        return redirect()->back();
    }
    
    public function temporary_save (Request $request) {
        $result = $this->HocHamServices->temporary_save($request);
        return redirect()->back();
    }

    public function del_temp_save (Request $request) {
        $result = $this->HocHamServices->temporary_save($request);
        return redirect()->back();
    }

}
