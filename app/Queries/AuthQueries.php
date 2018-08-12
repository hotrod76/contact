<?php

namespace App\Queries;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthQueries
{
	/**
	* Register a new user
	* 
	* @param \Illuminate\Http\Request $request
	* @return array Message
	*/
	public function register(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:60',
			'email' => 'required|email|unique:users',
			'password' => 'required|string|between:6,16|confirmed',
		]);

		$this->create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password,
		]);

		return ['message' => 'success'];
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required',
			'password' => 'required',
		]);
	}
}