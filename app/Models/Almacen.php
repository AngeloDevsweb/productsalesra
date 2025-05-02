<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 * 
 * @property int $id
 * @property string|null $NombreAlmacen
 * @property string|null $Descripcion
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Almacen extends Model
{
	protected $table = 'almacen';
	public $timestamps = false;

	protected $fillable = [
		'NombreAlmacen',
		'Descripcion'
	];

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'almacenproducto', 'idAlmacen', 'idProducto')
					->withPivot('id', 'CantidadExistente');
	}
}
