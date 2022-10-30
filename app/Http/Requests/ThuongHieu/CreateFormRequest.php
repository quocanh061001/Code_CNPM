<?php

namespace App\Http\Requests\ThuongHieu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'thuonghieu' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'thuonghieu.required' => 'Vui lòng nhập tên thương hiệu'
        ];
    }
}
