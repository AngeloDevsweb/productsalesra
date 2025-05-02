<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * 
 * @property int $id
 * @property string|null $NombreEmpleado
 * @property string|null $ApellidoPaterno
 * @property string|null $ApellidoMaterno
 * @property string|null $DocumentoIdentidad
 * @property int|null $idCargo
 * 
 * @property Cargo|null $cargo
 * @property Collection|Dptoseccionempleado[] $dptoseccionempleados
 *
 * @package App\Models
 */
class Empleado extends Model
{
	protected $table = 'empleado';
	public $timestamps = false;

	protected $casts = [
		'idCargo' => 'int'
	];

	protected $fillable = [
		'NombreEmpleado',
		'ApellidoPaterno',
		'ApellidoMaterno',
		'DocumentoIdentidad',
		'idCargo'
	];

	public function cargo()
	{
		return $this->belongsTo(Cargo::class, 'idCargo');
	}

	public function dptoseccionempleados()
	{
		return $this->hasMany(Dptoseccionempleado::class, 'idEmpleado');
	}
}
