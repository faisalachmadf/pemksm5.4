<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;

use DB;

class User extends SentinelUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'role', 'username',
    ];

    public function findWithCredentials($credentials) {
        return $this->where(DB::raw('lower(email)'), strtolower($credentials['email']))
            ->orWhere(DB::raw('lower(username)'), strtolower($credentials['username']))->first();
    }
}
