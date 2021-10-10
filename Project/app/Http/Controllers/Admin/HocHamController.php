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
        if(!($this->HocHamServices->temporary_table_list())->isEmpty()) {
            $datatam = $this->HocHamServices->temporary_table_list();
        }      
        else{
            $datatam = [];
        }
        return view('admin.hocham',[
            'title'=>'Thiết Lập Định Mức Học Hàm',
            'MaDotMoi'=>'2',
            'MaDotCu'=>'1',
            'TenHocHam'=> $this->HocHamServices->list(1),
            'BangTam'=> $datatam,
            'DanhSachHocHam'=> $this->HocHamServices->list(2) 
        ]); 
        
    }
    
    
    public function temporary_table (Request $request) {
        $this->HocHamServices->temporary_table($request);
        return redirect()->back();
    }

    public function del_temp_table ($id) {
        $this->HocHamServices->del_temp_table($id);
        return redirect()->back();
    }

    public function store() {
        $result = $this->HocHamServices->temporary_table_list();
        if(!($this->HocHamServices->temporary_table_list())->isEmpty()) {
            foreach($result as $result){
                $this->HocHamServices->store($result);
                $this->HocHamServices->update_temp_table($result["MaHocHam"]);
            }
        }
        return redirect()->back();
    }

}
