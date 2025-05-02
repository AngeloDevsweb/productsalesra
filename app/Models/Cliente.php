<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id
 * @property string|null $NombrePersona
 * @property string|null $ApellidoPaterno
 * @property string|null $ApellidoMaterno
 * @property Carbon|null $FechaNacimiento
 * @property string|null $DocumentoIdentidad
 * @property string|null $Direccion
 * 
 * @property Collection|Empresa[] $empresas
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	public $timestamps = false;

	protected $casts = [
		'FechaNacimiento' => 'datetime'
	];

	protected $fillable = [
		'NombrePersona',
		'ApellidoPaterno',
		'ApellidoMaterno',
		'FechaNacimiento',
		'DocumentoIdentidad',
		'Direccion'
	];

	public function empresas()
	{
		return $this->hasMany(Empresa::class, 'idPersona');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'idCliente');
	}
}
