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
 * @property string|null $address
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $phone
 * @property string|null $social_link
 * @property string|null $image
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'companies';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'address',
		'latitude',
		'longitude',
		'phone',
		'social_link',
		'image'
	];

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function services()
	{
		return $this->hasMany(Service::class);
	}
}
