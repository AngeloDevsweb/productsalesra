<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorium
 * 
 * @property int $id
 * @property string|null $NombreCategoria
 * @property string|null $Descripcion
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Categorium extends Model
{
	protected $table = 'categoria';
	public $timestamps = false;

	protected $fillable = [
		'NombreCategoria',
		'Descripcion'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'idCategoria');
	}
}
