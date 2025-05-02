<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacenproducto
 * 
 * @property int $id
 * @property int|null $CantidadExistente
 * @property int|null $idAlmacen
 * @property int|null $idProducto
 * 
 * @property Almacen|null $almacen
 * @property Producto|null $producto
 *
 * @package App\Models
 */
class Almacenproducto extends Model
{
	protected $table = 'almacenproducto';
	public $timestamps = false;

	protected $casts = [
		'CantidadExistente' => 'int',
		'idAlmacen' => 'int',
		'idProducto' => 'int'
	];

	protected $fillable = [
		'CantidadExistente',
		'idAlmacen',
		'idProducto'
	];

	public function almacen()
	{
		return $this->belongsTo(Almacen::class, 'idAlmacen');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idProducto');
	}
}
