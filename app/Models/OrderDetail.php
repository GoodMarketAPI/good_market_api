<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 06 Feb 2020 17:31:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OrderDetail
 * 
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $product_preprocessing_id
 * @property int $quantity
 * @property int $price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Order $order
 * @property \App\Models\Product $product
 * @property \App\Models\ProductPreprocessing $product_preprocessing
 *
 * @package App\Models
 */
class OrderDetail extends Eloquent
{
	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'product_preprocessing_id' => 'int',
		'quantity' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'product_preprocessing_id',
		'quantity',
		'price'
	];

	public function order()
	{
		return $this->belongsTo(\App\Models\Order::class);
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function product_preprocessing()
	{
		return $this->belongsTo(\App\Models\ProductPreprocessing::class);
	}
}
