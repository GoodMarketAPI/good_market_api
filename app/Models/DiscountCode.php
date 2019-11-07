<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DiscountCode
 * 
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $orders
 *
 * @package App\Models
 */
class DiscountCode extends Eloquent
{
	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'code'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class, 'order_discount_code', 'code');
	}
}
