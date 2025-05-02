<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 * 
 * @property int $id
 * @property string|null $NombreCargo
 * @property string|null $DescripcionCargo
 * 
 * @property Collection|Empleado[] $empleados
 *
 * @package App\Models
 */
class Cargo extends Model
{
	protected $table = 'cargo';
	public $timestamps = false;

	protected $fillable = [
		'NombreCargo',
		'DescripcionCargo'
	];

	public function empleados()
	{
		return $this->hasMany(Empleado::class, 'idCargo');
	}
}
