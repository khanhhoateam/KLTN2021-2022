<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DotKeKhaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tgbd' => 'unique:DotKeKhai,ThoiGianBatDau',
            'tgkt' => 'unique:DotKeKhai,ThoiGianKetThuc',
        ];
    }
    public function messages() : array
    {
        return [
            'tgbd.unique' => 'Đã có Đợt kê khai bắt đầu từ ngày này !',
            'tgkt.unique' => 'Đã có Đợt kê khai kết thúc vào ngày này !'
        ];
    }
}
