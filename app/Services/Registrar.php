<?php namespace App\Services;

use App\User;
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
			'username' => 'required|max:30|min:2|unique:users',
			'password' => 'required|confirmed|min:6|max:60',
            'faction'  => 'required',
            'game_class' => 'required',
            'race' => 'required',
            'gender' => 'required'
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
		return User::create([
			'username' => $data['username'],
			'password' => bcrypt($data['password']),
            'game_class_id'    => $data['game_class'],
            'game_faction_id'  => $data['faction'],
            'game_race_id'  => $data['race'],
            'gender' => $data['gender']
		]);
	}

}
