<?php

namespace App\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'access_token' => $this->access_token,
            'token_type' => 'Bearer',
            'expires_at' => $this->expires_at,
            'user' => AuthUserResource( $this->user ),
        ];
    }
}
