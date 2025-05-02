<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dptoseccionempleado
 * 
 * @property int $id
 * @property int|null $idDepartamentoSeccion
 * @property int|null $idEmpleado
 * 
 * @property Departamentoseccion|null $departamentoseccion
 * @property Empleado|null $empleado
 *
 * @package App\Models
 */
class Dptoseccionempleado extends Model
{
	protected $table = 'dptoseccionempleado';
	public $timestamps = false;

	protected $casts = [
		'idDepartamentoSeccion' => 'int',
		'idEmpleado' => 'int'
	];

	protected $fillable = [
		'idDepartamentoSeccion',
		'idEmpleado'
	];

	public function departamentoseccion()
	{
		return $this->belongsTo(Departamentoseccion::class, 'idDepartamentoSeccion');
	}

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'idEmpleado');
	}
}
