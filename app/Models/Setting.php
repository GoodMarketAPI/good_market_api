<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string $name
 * @property string $value
 *
 * @package App\Models
 */
class Setting extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name',
		'value'
	];
}
