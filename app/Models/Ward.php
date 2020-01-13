<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 Jan 2020 15:45:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ward
 * 
 * @property int $id
 * @property int $district_id
 * @property string $type
 * @property string $ward
 * 
 * @property \App\Models\District $district
 *
 * @package App\Models
 */
class Ward extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'district_id' => 'int'
	];

	protected $fillable = [
		'district_id',
		'type',
		'ward'
	];

	public function district()
	{
		return $this->belongsTo(\App\Models\District::class);
	}
}
