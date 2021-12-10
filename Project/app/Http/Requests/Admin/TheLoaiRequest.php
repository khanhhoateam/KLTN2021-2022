<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TheLoaiRequest extends FormRequest
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
            'Ten_the_loai' => 'unique:TheLoai,TenTheLoai,NULL,MaTheLoai,MaDot,'.request('Ma_dot')
        ];
    }
    public function messages() : array
    {
        return [
            'Ten_the_loai.unique' => 'Thể loại này đã được khai báo !'
        ];
    }
}
