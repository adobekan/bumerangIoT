<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
            'name' => 'required|min:6',
            'username' => 'required|min:3|unique',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'accessKey'  => 'required|min:20'
        ];
    }

}
