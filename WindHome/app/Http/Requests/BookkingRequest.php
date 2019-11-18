<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookkingRequest extends FormRequest
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
            'rentTime' => 'required|numeric|min:1'
            //
        ];
    }

    public function messages()
    {
        return [
            'rentTime.required' => 'Thời gian thuê không được để trống',
            'rentTime.numeric' => 'Thời gian thuê phải là số',
            'rentTime.min' => 'Thời gian thuê tối thiểu 1 tháng',
        ];
    }
}
