<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\MienGiamServices;

class MienGiamController extends Controller
{
    // public function __construct(MienGiamServices $MienGiamServices) {
    //     $this->MienGiamServices = $MienGiamServices;
    // }

    // public function create() {
    //     if(!($this->MienGiamServices->temporary_table_list())->isEmpty()) {
    //         $datatam = $this->MienGiamServices->temporary_table_list();
    //     }
    //     else{
    //         $datatam = [];
    //     }
    //     return view('pages.admin.hocham.hocham',[
    //         'title'=>'THIẾT LẬP ĐỊNH MỨC HỌC HÀM',
    //         'MaDotMoi'=>'2',
    //         'MaDotCu'=>'1',
    //         'TenHocHam'=> $this->MienGiamServices->list(1),
    //         'BangTam'=> $datatam,
    //         'DanhSachHocHam'=> $this->MienGiamServices->list(2)
    //     ]);

    // }


    // public function temporary_table (Request $request) {
    //     $this->MienGiamServices->temporary_table($request);
    //     return redirect()->back();
    // }

    // public function del_temp_table ($id) {
    //     $this->MienGiamServices->del_temp_table($id);
    //     return redirect()->back();
    // }

    // public function store() {
    //     $result = $this->MienGiamServices->temporary_table_list();
    //     if(!($this->MienGiamServices->temporary_table_list())->isEmpty()) {
    //         foreach($result as $result){
    //             $this->MienGiamServices->store($result);
    //             $this->MienGiamServices->update_temp_table($result["MaHocHam"]);
    //         }
    //     }
    //     return redirect()->back();
    // }
}
