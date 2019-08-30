<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editProfileRequest extends FormRequest
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
            //
            'edit_email'=>'required|email',
            'edit_password'=>'required|min:6',
            'edit_phonenumber'=>'required|max:11',
            'edit_username'=>'required'
        ];
    }
}
