<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 * 
 * @property int $id
 * @property Carbon|null $FechaEmision
 * @property float|null $MontoFacturado
 * @property string|null $CodigoControl
 * @property int|null $idPedido
 * 
 * @property Pedido|null $pedido
 *
 * @package App\Models
 */
class Factura extends Model
{
	protected $table = 'factura';
	public $timestamps = false;

	protected $casts = [
		'FechaEmision' => 'datetime',
		'MontoFacturado' => 'float',
		'idPedido' => 'int'
	];

	protected $fillable = [
		'FechaEmision',
		'MontoFacturado',
		'CodigoControl',
		'idPedido'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'idPedido');
	}
}
