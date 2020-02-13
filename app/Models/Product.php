<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 16:33:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $id
 * @property int $supplier_id
 * @property int $category_id
 * @property string $name
 * @property int $price
 * @property string $unit
 * @property int $temp_price
 * @property string $temp_unit
 * @property string $temp_weight
 * @property string $short_description
 * @property string $note
 * @property \Carbon\Carbon $expected_date
 * @property \Carbon\Carbon $expired_date
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Supplier $supplier
 * @property \Illuminate\Database\Eloquent\Collection $order_details
 * @property \Illuminate\Database\Eloquent\Collection $product_preprocessings
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $casts = [
		'supplier_id' => 'int',
		'category_id' => 'int',
		'price' => 'int',
		'temp_price' => 'int',
        'order_details_count' => 'int'
	];

	protected $dates = [
		'expected_date',
		'expired_date'
	];

	protected $fillable = [
		'supplier_id',
		'category_id',
		'name',
		'price',
		'unit',
		'temp_price',
		'temp_unit',
		'temp_weight',
		'short_description',
		'note',
		'expected_date',
		'expired_date',
		'description'
	];

	protected $with = [
	    'product_preprocessings'
    ];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function supplier()
	{
		return $this->belongsTo(\App\Models\Supplier::class);
	}

	public function order_details()
	{
		return $this->hasMany(\App\Models\OrderDetail::class);
	}

	public function product_preprocessings()
	{
		return $this->hasMany(\App\Models\ProductPreprocessing::class);
	}

    public function sale_products()
    {
        return $this->hasMany(\App\Models\SaleProduct::class);
    }
}
