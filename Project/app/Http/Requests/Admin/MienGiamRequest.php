<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MienGiamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Ten_mien_giam' => 'unique:LoaiMienGiam,TenMienGiam,NULL,MaMienGiam,MaDot,'.request('Ma_dot'),
            'Diem' => 'required_without:TyLe',
            'TyLe' => 'required_without:Diem',

        ];
    }
    public function messages() : array
    {
        return [
            'Ten_mien_giam.unique' => 'Miễn giảm này đã được khai báo !',
            'Diem.required_without' => 'Phải nhập Điểm miễn giảm hoặc Tỷ lệ miễn giảm !',
            'TyLe.required_without' => 'Phải nhập Điểm miễn giảm hoặc Tỷ lệ miễn giảm !',
            'TyLe.required_with' => 'Không được thêm cả hai !'
        ];
    }
}
