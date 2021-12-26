<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeesService
 * 
 * @property int $employee_id
 * @property int $service_id
 *
 * @package App\Models
 */
class EmployeesService extends Model
{
	protected $table = 'employees_services';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'service_id' => 'int'
	];
	
	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
