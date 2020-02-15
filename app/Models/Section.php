<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 15 Feb 2020 17:30:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Section
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Section extends Eloquent
{
	protected $casts = [
		'order' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'order'
	];

	protected $hidden = [
	    'created_at',
        'updated_at'
    ];
}
