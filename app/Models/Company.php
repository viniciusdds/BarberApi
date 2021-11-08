<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $phone
 * @property string|null $social_link
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'companies';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'latitude',
		'longitude',
		'phone',
		'social_link'
	];

	public function employees(){
		return $this->hasMany(Employee::class);
	}

	public function services()
	{
		return $this->hasMany(Service::class);
	}
}
