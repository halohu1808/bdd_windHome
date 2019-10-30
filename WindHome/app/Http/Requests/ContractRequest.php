<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'startTime' => 'required',
            'price' => 'required|numeric|min:1000000',
            'rentTime' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'startTime.required' => 'Ngày bắt đầu hợp đồng không được để trống',
            'price.required' => 'Tiền thuê phòng không được để trống',
            'price.min' => 'Tiền thuê phòng tối thiểu 1 triệu',
            'price.numeric' => 'Tiền thuê phòng phải nhập là số',
            'rentTime.required' => 'Thời gian thuê không được để trống',
            'rentTime.min' => 'Thời gian thuê tối thiểu là 1 tháng',
            'rentTime.numeric' => 'Thời gian thuê phải là số',
        ];
    }
}
