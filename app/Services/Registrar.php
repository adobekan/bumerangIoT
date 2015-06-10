<?php namespace App\Services;

use App\User;
use App\UserType;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
            'username'=> 'required|min:5|max:40|unique:users',
			'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        /**
         * Create new user and set the user level to the first id of table UserType.
         * In our case will be 1 for the Regular .
         */
		return User::create([
			'name' => $data['name'],
            'username' => $data['username'],
			'email' => $data['email'],
            'accessKey' => iconv_substr(Hash::make($data['email'] . $data['password']),35,55),
            'level' => UserType::firstOrFail()->pluck('id'),
			'password' => bcrypt($data['password']),
		]);
	}

}