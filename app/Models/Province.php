<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Province
 * 
 * @property int $id
 * @property string $province_id
 * 
 * @property \Illuminate\Database\Eloquent\Collection $districts
 *
 * @package App\Models
 */
class Province extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'province_id'
	];

	public function districts()
	{
		return $this->hasMany(\App\Models\District::class);
	}
}
