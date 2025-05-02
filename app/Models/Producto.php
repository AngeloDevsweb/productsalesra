<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property string|null $NombreProducto
 * @property string|null $DescripcionProducto
 * @property int|null $idCategoria
 * 
 * @property Categorium|null $categorium
 * @property Collection|Almacen[] $almacens
 * @property Collection|Detallepedido[] $detallepedidos
 * @property Collection|Precio[] $precios
 * @property Collection|Color[] $colors
 * @property Collection|Talla[] $tallas
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'producto';
	public $timestamps = false;

	protected $casts = [
		'idCategoria' => 'int'
	];

	protected $fillable = [
		'NombreProducto',
		'DescripcionProducto',
		'idCategoria'
	];

	public function categorium()
	{
		return $this->belongsTo(Categorium::class, 'idCategoria');
	}

	public function almacens()
	{
		return $this->belongsToMany(Almacen::class, 'almacenproducto', 'idProducto', 'idAlmacen')
					->withPivot('id', 'CantidadExistente');
	}

	public function detallepedidos()
	{
		return $this->hasMany(Detallepedido::class, 'idProducto');
	}

	public function precios()
	{
		return $this->hasMany(Precio::class, 'idProducto');
	}

	public function colors()
	{
		return $this->belongsToMany(Color::class, 'productocolor', 'idProducto', 'idColor')
					->withPivot('id');
	}

	public function tallas()
	{
		return $this->belongsToMany(Talla::class, 'productotalla', 'idProducto', 'idTalla')
					->withPivot('id');
	}
}
