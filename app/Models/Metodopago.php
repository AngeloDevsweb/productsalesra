<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Metodopago
 * 
 * @property int $id
 * @property string|null $NombreMetodo
 * @property string|null $Descripcion
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Metodopago extends Model
{
	protected $table = 'metodopago';
	public $timestamps = false;

	protected $fillable = [
		'NombreMetodo',
		'Descripcion'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'idMetodoPago');
	}
}
