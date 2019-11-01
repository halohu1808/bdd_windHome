<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
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

            'passwordOld' => 'required',
            'passwordNew' => 'required|min:8',
            'passwordConfirm' => 'required|same:passwordNew',

        ];


    }

    public function messages()
    {
        return [

            'passwordOld.required' => 'Mật khẩu cũ không được để trống',
            'passwordNew.required' => 'Mật khẩu mới không được để trống',
            'passwordNew.min' => 'Mật khẩu phải nhiều hơn 8 ký tự',
            'passwordConfirm.required' => 'Mật khẩu nhập lại không được để trống',
            'passwordConfirm.same' => 'Mật khẩu nhập lại không giống mật khẩu mới',

        ];
    }
}
