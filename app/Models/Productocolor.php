<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Productocolor
 * 
 * @property int $id
 * @property int|null $idProducto
 * @property int|null $idColor
 * 
 * @property Producto|null $producto
 * @property Color|null $color
 *
 * @package App\Models
 */
class Productocolor extends Model
{
	protected $table = 'productocolor';
	public $timestamps = false;

	protected $casts = [
		'idProducto' => 'int',
		'idColor' => 'int'
	];

	protected $fillable = [
		'idProducto',
		'idColor'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idProducto');
	}

	public function color()
	{
		return $this->belongsTo(Color::class, 'idColor');
	}
}
