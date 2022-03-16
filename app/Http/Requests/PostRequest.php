<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "content" => "required",
            "status_id" => "required",
            'user_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            "content.required" => "Nội dung không được để trống.",
            "status_id.required" => "Trạng thái không được để trống.",
            "user_id.required" => "Tên người dùng  không được để trống.",
        ];
    }
}