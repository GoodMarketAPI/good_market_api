<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OrderDetail
 * 
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property int $price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class OrderDetail extends Eloquent
{
	protected $casts = [
		'product_id' => 'int',
		'quantity' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'product_id',
		'quantity',
		'price'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
