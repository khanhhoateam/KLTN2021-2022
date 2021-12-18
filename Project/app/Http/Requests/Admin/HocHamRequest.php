<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HocHamRequest extends FormRequest
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
            'Ten_hoc_ham' => 'unique:HocHamTam,TenHocHam,MaHocHam,Active,MaDot,'.request('Ma_dot')
        ];
    }
    public function messages() : array
    {
        return [
            'Ten_hoc_ham.unique' => 'Học hàm này đã được thiết lập !'
        ];
    }
}
