<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $id
 * @property Carbon|null $FechaPedido
 * @property string|null $EstadoPedido
 * @property int|null $idEmpresa
 * @property int|null $idCliente
 * @property int|null $idMetodoPago
 * 
 * @property Empresa|null $empresa
 * @property Cliente|null $cliente
 * @property Metodopago|null $metodopago
 * @property Collection|Detallepedido[] $detallepedidos
 * @property Collection|Factura[] $facturas
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	public $timestamps = false;

	protected $casts = [
		'FechaPedido' => 'datetime',
		'idEmpresa' => 'int',
		'idCliente' => 'int',
		'idMetodoPago' => 'int'
	];

	protected $fillable = [
		'FechaPedido',
		'EstadoPedido',
		'idEmpresa',
		'idCliente',
		'idMetodoPago'
	];

	public function empresa()
	{
		return $this->belongsTo(Empresa::class, 'idEmpresa');
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'idCliente');
	}

	public function metodopago()
	{
		return $this->belongsTo(Metodopago::class, 'idMetodoPago');
	}

	public function detallepedidos()
	{
		return $this->hasMany(Detallepedido::class, 'idPedido');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'idPedido');
	}
}
