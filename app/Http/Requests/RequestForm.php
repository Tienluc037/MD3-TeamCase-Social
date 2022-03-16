<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestForm extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'role_id' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        $message = [
            'name.required' => 'Your name can not empty ',
            'email.required' => 'Your email can not  empty',
            'password.required' => 'Your password can not empty',
            'address.required' => 'Your address can not empty',
            'role_id.required' => 'Your role can not empty',
            'content.required' => 'Your content can not empty',
        ];
        return $message;
    }
}

