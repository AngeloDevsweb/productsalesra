<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamentoseccion
 * 
 * @property int $id
 * @property string|null $NombreDepartamento
 * @property string|null $Descripcion
 * @property int|null $idEmpresa
 * 
 * @property Empresa|null $empresa
 * @property Collection|Dptoseccionempleado[] $dptoseccionempleados
 *
 * @package App\Models
 */
class Departamentoseccion extends Model
{
	protected $table = 'departamentoseccion';
	public $timestamps = false;

	protected $casts = [
		'idEmpresa' => 'int'
	];

	protected $fillable = [
		'NombreDepartamento',
		'Descripcion',
		'idEmpresa'
	];

	public function empresa()
	{
		return $this->belongsTo(Empresa::class, 'idEmpresa');
	}

	public function dptoseccionempleados()
	{
		return $this->hasMany(Dptoseccionempleado::class, 'idDepartamentoSeccion');
	}
}
