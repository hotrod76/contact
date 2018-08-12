<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Get a user's companies (if applicable)
    */
    public function companies()
    {
    	return $this->hasMany( Company::class, 'owner_id', 'id' );
    }

    /**
    * Get a user's assigned departments (if applicable)
    */
    public function departments()
    {
    	return $this->belongsToMany( Department::class );
    }
}
