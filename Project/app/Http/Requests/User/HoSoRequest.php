<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HoSoRequest extends FormRequest
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
            'TenGiangVien' => 'unique:GiangVien',
            'Email' => 'unique:GiangVien',
        ];
    }
    public function messages() : array
    {
        return [
            'TenGiangVien.unique' => 'Tên này đã được đăng ký đã được khai báo !',
            'Email.unique' => 'Email này đã được đăng ký đã được khai báo !',
        ];
    }
}
