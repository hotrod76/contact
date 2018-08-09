<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Get all assigned users
    */
    public function users()
    {
    	return $this->belongsToMany( User::class )->withTimestamps();
    }

    /**
    * Get owning company
    */
    public function company()
    {
    	return $this->belongsTo( Company::class );
    }
}
