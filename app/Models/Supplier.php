<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Supplier
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Supplier extends Eloquent
{
	protected $fillable = [
		'name'
	];

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class);
	}
}
