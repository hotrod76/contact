<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Get owning user
    */
  	public function owner()
  	{
  		return $this->belongsTo( User::class, 'owner_id', 'id' );
  	}

  	/**
    * Get all departments
    */
  	public function departments()
  	{
  		return $this->hasMany( Department::class );
  	}
}
