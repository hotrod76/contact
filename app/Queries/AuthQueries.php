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

	/**
     * Login user and create token
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Collection 
     */
	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required',
			'password' => 'required',
			'remember_me' => 'required|boolean',
		]);

		$credentials = request(['email', 'password']);

        if( !Auth::attempt( request( ['email', 'password'] ) ) ) {

            return response()->json( ['message' => 'Unauthorized', 401 );

        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request->remember_me) {

            $token->expires_at = Carbon::now()->addWeeks(1);

        }

        $token->save();

        return collect([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse( $tokenResult->token->expires_at )->toDateTimeString(),
            'user' => $request->user(),
        ]);
	}

	public function logout()
	{
		if( $request->user() ) {

			$request->user()->token()->revoke();

			return ['message' => 'success'];

		}

		return ['message' => 'error'];
	}
}