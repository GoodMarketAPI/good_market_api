<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:40:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class District
 * 
 * @property int $id
 * @property int $province_id
 * @property string $district
 * 
 * @property \App\Models\Province $province
 * @property \Illuminate\Database\Eloquent\Collection $orders
 *
 * @package App\Models
 */
class District extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'province_id' => 'int'
	];

	protected $fillable = [
		'province_id',
		'district'
	];

	public function province()
	{
		return $this->belongsTo(\App\Models\Province::class);
	}

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class, 'receiver_district_id');
	}
}
