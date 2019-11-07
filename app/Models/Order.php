<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:40:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $user_id
 * @property string $order_code
 * @property string $receiver_name
 * @property string $receiver_phone
 * @property string $receiver_address
 * @property int $receiver_district_id
 * @property string $receiver_latitude
 * @property string $receiver_longitude
 * @property int $sub_total
 * @property int $total
 * @property string $order_discount_code
 * @property string $order_voucher_code
 * @property \Carbon\Carbon $delivery_date
 * @property \Carbon\Carbon $delivery_time
 * @property string $note
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\DiscountCode $discount_code
 * @property \App\Models\VoucherCode $voucher_code
 * @property \App\Models\District $district
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Order extends Eloquent
{
	protected $casts = [
		'user_id' => 'int',
		'receiver_district_id' => 'int',
		'sub_total' => 'int',
		'total' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'delivery_date',
		'delivery_time'
	];

	protected $fillable = [
		'user_id',
		'order_code',
		'receiver_name',
		'receiver_phone',
		'receiver_address',
		'receiver_district_id',
		'receiver_latitude',
		'receiver_longitude',
		'sub_total',
		'total',
		'order_discount_code',
		'order_voucher_code',
		'delivery_date',
		'delivery_time',
		'note',
		'status'
	];

	public function discount_code()
	{
		return $this->belongsTo(\App\Models\DiscountCode::class, 'order_discount_code', 'code');
	}

	public function voucher_code()
	{
		return $this->belongsTo(\App\Models\VoucherCode::class, 'order_voucher_code', 'code');
	}

	public function district()
	{
		return $this->belongsTo(\App\Models\District::class, 'receiver_district_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
