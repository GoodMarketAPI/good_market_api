<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Feb 2020 11:28:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SaleBanner
 * 
 * @property int $id
 * @property int $sale_id
 * @property string $banner
 * 
 * @property \App\Models\Sale $sale
 *
 * @package App\Models
 */
class SaleBanner extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'sale_id' => 'int'
	];

	protected $fillable = [
		'sale_id',
		'banner'
	];

	protected $appends = [
	    'banner_link'
    ];

    public function getBannerLinkAttribute()
    {
        if($this->banner && \Storage::exists('suppliers/sales/' . $this->banner))
            return asset(\Storage::url('suppliers/sales/' . $this->banner));
        return '';
    }

	public function sale()
	{
		return $this->belongsTo(\App\Models\Sale::class);
	}
}
