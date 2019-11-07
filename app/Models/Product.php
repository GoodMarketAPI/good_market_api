<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:40:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $id
 * @property int $supplier_id
 * @property string $name
 * @property int $price
 * @property string $unit
 * @property int $temp_price
 * @property string $temp_unit
 * @property int $promotional_price
 * @property string $promotional_unit
 * @property int $temp_promotional_price
 * @property string $temp_promotional_unit
 * @property int $stock
 * @property int $fee
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Supplier $supplier
 * @property \Illuminate\Database\Eloquent\Collection $order_details
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $casts = [
		'supplier_id' => 'int',
		'price' => 'int',
		'temp_price' => 'int',
		'promotional_price' => 'int',
		'temp_promotional_price' => 'int',
		'stock' => 'int',
		'fee' => 'int'
	];

	protected $fillable = [
		'supplier_id',
		'name',
		'price',
		'unit',
		'temp_price',
		'temp_unit',
		'promotional_price',
		'promotional_unit',
		'temp_promotional_price',
		'temp_promotional_unit',
		'stock',
		'fee'
	];

	public function supplier()
	{
		return $this->belongsTo(\App\Models\Supplier::class);
	}

	public function order_details()
	{
		return $this->hasMany(\App\Models\OrderDetail::class);
	}
}
