<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Precio
 * 
 * @property int $id
 * @property float|null $Preciop
 * @property int|null $idProducto
 * 
 * @property Producto|null $producto
 *
 * @package App\Models
 */
class Precio extends Model
{
	protected $table = 'precio';
	public $timestamps = false;

	protected $casts = [
		'Preciop' => 'float',
		'idProducto' => 'int'
	];

	protected $fillable = [
		'Preciop',
		'idProducto'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idProducto');
	}
}
