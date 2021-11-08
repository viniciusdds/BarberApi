<?php


namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
	use Notifiable;
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'activated' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'activated'
	];

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}


	//JWT
	public function getJWTIdentifier()
    {
        return $this->getKey();
    }

	public function getJWTCustomClaims()
    {
        return [];
    }
}
