<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 06 Jan 2020 15:43:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Province
 * 
 * @property int $id
 * @property string $province
 * @property string $type
 * @property float $latitude
 * @property float $longitude
 * 
 * @property \Illuminate\Database\Eloquent\Collection $districts
 *
 * @package App\Models
 */
class Province extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'latitude' => 'float',
		'longitude' => 'float'
	];

	protected $fillable = [
		'province',
		'type',
		'latitude',
		'longitude'
	];

	public function districts()
	{
		return $this->hasMany(\App\Models\District::class);
	}
}
