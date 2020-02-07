<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Nov 2019 05:40:35 +0000.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $user_code
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property \Carbon\Carbon $birthday
 * @property string $address
 * @property int $referral_id
 * @property bool $notification
 * @property string $device_token
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $discount_codes
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $casts = [
        'notification' => 'bool'
    ];

	protected $dates = [
		'birthday'
	];

	protected $hidden = [
		'password',
        'avatar',
        'remember_token',
        'created_at',
        'updated_at',
	];

	protected $fillable = [
		'user_code',
		'name',
		'phone',
		'email',
		'password',
		'birthday',
		'address',
		'referral_id',
		'notification',
		'device_token',
		'remember_token'
	];

    protected $appends = ['avatar_url'];

    protected $with = ['referrer'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $time = Carbon::today()->format('ym');
            $insert_id = self::max('id') + 1;
            $month_user_number    = self::whereMonth('created_at', Carbon::today()->month)->count() + 1;
            $model->user_code = "KH" . $time . $insert_id . "C" . $month_user_number;
        });
    }

    public function getAvatarUrlAttribute()
    {
        if($this->avatar){
            if(strpos($this->avatar, "https://") !== false){
                return $this->avatar;
            }
            if($this->avatar && \Storage::exists('users/avatars/' . $this->avatar))
                return asset(\Storage::url('users/avatars/' . $this->avatar));
        }
        return asset('images/user_default.png');
    }

	public function referrer()
	{
		return $this->belongsTo(\App\Models\User::class, 'referral_id');
	}

	public function discount_codes()
	{
		return $this->hasMany(\App\Models\DiscountCode::class);
	}

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class)->orderByDesc('id');
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'referral_id');
	}
}
