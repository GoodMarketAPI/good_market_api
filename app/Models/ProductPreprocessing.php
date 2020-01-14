<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 16:22:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductPreprocessing
 * 
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $fee
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductPreprocessing extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'name',
		'fee'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
