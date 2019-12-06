<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'first_name' => 'alpha|required',
            'last_name' => 'alpha|required',
            'password' => 'alpha_num|required|min:8|same:confirm_password',
            'email' => 'required|email|unique:users',
            'roles'=>'required',
            'confirm_password'=>'required'
      
        ];
    }
}
