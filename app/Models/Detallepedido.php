<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detallepedido
 * 
 * @property int $id
 * @property int|null $Cantidad
 * @property int|null $idPedido
 * @property int|null $idProducto
 * @property float|null $PrecioCompra
 * 
 * @property Pedido|null $pedido
 * @property Producto|null $producto
 *
 * @package App\Models
 */
class Detallepedido extends Model
{
	protected $table = 'detallepedido';
	public $timestamps = false;

	protected $casts = [
		'Cantidad' => 'int',
		'idPedido' => 'int',
		'idProducto' => 'int',
		'PrecioCompra' => 'float'
	];

	protected $fillable = [
		'Cantidad',
		'idPedido',
		'idProducto',
		'PrecioCompra'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'idPedido');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idProducto');
	}
}
