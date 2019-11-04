<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email,'.$this->id_user.',id',
            'password'=>'required|min:5',
            'full'=>'required',
            'address'=>'required',
            'phone'=>'required',            
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Email không được trùng',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min:5'=>'Mật khẩu không được dưới 5 kí tự',
            'full.required'=>'Tên không được để trống',
            'address.required'=>'Địa chỉ không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',        
        ];
    }
}
