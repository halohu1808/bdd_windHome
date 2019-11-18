<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRoom extends FormRequest
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
//            'name' => 'required|unique:posts|max:255',
            'name' => 'required',
            'address' => 'required',
            'cityId' => 'required',
            'pricePerMonth' => 'required',
            'minRentTime' => 'required',
            'guest' => 'required',
            'electricFee' => 'required|numeric|min:1',
            'waterFee' => 'required|numeric|min:1',
            'trashFee' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return ['name.required' => 'Tên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'cityId.required' => 'Tên thành phố không được để trống',
            'pricePerMonth.required' => 'Tiên thuê không được để trống',
            'minRentTime.required' => 'Thời gian không được để trống',
            'guest.required' => 'Số người không được để trống',
            'electricFee.required' => 'Tiền điện không được để trống',
            'electricFee.numeric'=>'Tiền điện phải là số',
            'electricFee.min'=>'Tiền điện phải lớn hơn 0',
            'waterFee.required' => 'Tiền nước không được để trống',
            'waterFee.numeric'=>'Tiền nước phải là số',
            'waterFee.min'=>'tiền nước phải lớn hơn 0',
            'trashFee.required' => 'Tiền vệ sinh không được để trống',
            'trashFee.numeric'=>'Tiền vệ sinh phải là số',
            'trashFee.min'=>'Tiền vệ sinh phải lớn hơn 0',
        ];
    }
}
