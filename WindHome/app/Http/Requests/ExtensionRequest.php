<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtensionRequest extends FormRequest
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
            'extensionTime' => 'required|numeric|min:1'];
    }

    public function messages()
    {
        return [
            'extensionTime.required' => 'Thời gian thuê thêm không được để trống',
            'extensionTime.min' => 'Thời gian thuê thêm ít nhất 1 tháng',
        ];
    }
}
