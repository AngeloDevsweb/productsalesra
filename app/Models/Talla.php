<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Talla
 * 
 * @property int $id
 * @property string|null $Nombre
 * @property string|null $Descripcion
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Talla extends Model
{
	protected $table = 'talla';
	public $timestamps = false;

	protected $fillable = [
		'Nombre',
		'Descripcion'
	];

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'productotalla', 'idTalla', 'idProducto')
					->withPivot('id');
	}
}
