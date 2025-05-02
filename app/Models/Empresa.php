<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property int $id
 * @property string|null $NombreEmpresa
 * @property string|null $NroLicencia
 * @property string|null $Direccion
 * @property string|null $Telefono
 * @property int|null $idPersona
 * 
 * @property Cliente|null $cliente
 * @property Collection|Departamentoseccion[] $departamentoseccions
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Empresa extends Model
{
	protected $table = 'empresa';
	public $timestamps = false;

	protected $casts = [
		'idPersona' => 'int'
	];

	protected $fillable = [
		'NombreEmpresa',
		'NroLicencia',
		'Direccion',
		'Telefono',
		'idPersona'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'idPersona');
	}

	public function departamentoseccions()
	{
		return $this->hasMany(Departamentoseccion::class, 'idEmpresa');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'idEmpresa');
	}
}
