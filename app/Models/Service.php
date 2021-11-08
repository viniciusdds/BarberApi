<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property string|null $name
 * @property float|null $cost
 * @property int $employee_id
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	public $timestamps = false;

	protected $casts = [
		'cost' => 'float',
		'employee_id' => 'int'
	];

	protected $fillable = [
		'name',
		'cost',
		'employee_id'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function employees()
	{
		return $this->belongsToMany(Employee::class, 'employees_services');
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}
}
