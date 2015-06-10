<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DataLogRequest extends Request {

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
        foreach($this->request->get('data') as $key => $val)
        {
            $rules['data.'.$key] = 'required|min:1|max:60';
        }

    return $rules;
	}

}
