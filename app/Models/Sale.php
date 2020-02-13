<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Feb 2020 11:28:32 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sale
 * 
 * @property int $id
 * @property int $supplier_id
 * @property string $name
 * @property \Carbon\Carbon $start
 * @property \Carbon\Carbon $end
 * 
 * @property \App\Models\Supplier $supplier
 * @property \Illuminate\Database\Eloquent\Collection $sale_banners
 *
 * @package App\Models
 */
class Sale extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'supplier_id' => 'int'
	];

	protected $dates = [
		'start',
		'end'
	];

	protected $fillable = [
		'supplier_id',
		'name',
		'start',
		'end'
	];

	protected $with = [
	    'sale_banners'
    ];

	public function supplier()
	{
		return $this->belongsTo(\App\Models\Supplier::class);
	}

	public function sale_banners()
	{
		return $this->hasMany(\App\Models\SaleBanner::class);
	}
}
