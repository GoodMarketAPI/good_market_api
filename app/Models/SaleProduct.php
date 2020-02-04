<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Feb 2020 03:40:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SaleProduct
 * 
 * @property int $id
 * @property int $product_id
 * @property \Carbon\Carbon $start
 * @property \Carbon\Carbon $end
 * @property float $sale
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class SaleProduct extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'sale' => 'float'
	];

	protected $dates = [
		'start:Y-m-d',
		'end:Y-m-d'
	];

	protected $fillable = [
		'product_id',
		'start',
		'end',
		'sale'
	];

	protected $with = ['product'];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
