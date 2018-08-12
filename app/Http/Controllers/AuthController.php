<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Resources\Auth\{
    LoginResource,
    AuthUserResource
}
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
    * Register a new user
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\User $user
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $response = $user->register( $request );

        return response()->json( $response, 201 );
    }

    /**
    * Attempt to login a user
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\User $user
    * @return \App\Resources\Auth\LoginResource
    */
    public function login(Request $request)
    {
        return new LoginResource( $user->login( $request ) );
    }

    /**
    * Attempt to get auth user's data
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\User $user
    * @return \App\Resources\Auth\AuthUserResource
    */
    public function data(Request $request)
    {
        return new AuthUserResource( $request->user() );
    }

    /**
    * Attempt to log auth user out and revoke token
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\User $user
    * @return \Illuminate\Http\Response
    */
    public function logout(Request $request)
    {
        $response = $user->logout( $request );

        return response()->json( $response, 200 );
    }
}
