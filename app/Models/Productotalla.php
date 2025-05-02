<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Productotalla
 * 
 * @property int $id
 * @property int|null $idProducto
 * @property int|null $idTalla
 * 
 * @property Producto|null $producto
 * @property Talla|null $talla
 *
 * @package App\Models
 */
class Productotalla extends Model
{
	protected $table = 'productotalla';
	public $timestamps = false;

	protected $casts = [
		'idProducto' => 'int',
		'idTalla' => 'int'
	];

	protected $fillable = [
		'idProducto',
		'idTalla'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idProducto');
	}

	public function talla()
	{
		return $this->belongsTo(Talla::class, 'idTalla');
	}
}
