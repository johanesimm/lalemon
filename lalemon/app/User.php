<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
	use Authenticatable;

    protected $table        = 'm_user';
    protected $primaryKey   = 'id';
    protected $fillable = ['id', 'username', 'password', 'remember_token', 'created_at', 'updated_at', 'status'];
}