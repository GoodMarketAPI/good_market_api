<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:40:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class VoucherCode
 * 
 * @property int $id
 * @property string $code
 * @property int $price
 * @property int $type
 * @property \Carbon\Carbon $expired_time
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $orders
 *
 * @package App\Models
 */
class VoucherCode extends Eloquent
{
	protected $casts = [
		'price' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'expired_time'
	];

	protected $fillable = [
		'code',
		'price',
		'type',
		'expired_time'
	];

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class, 'order_voucher_code', 'code');
	}
}
