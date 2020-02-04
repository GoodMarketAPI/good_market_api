<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Feb 2020 03:08:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Banner
 *
 * @property int $id
 * @property string $banner
 *
 * @package App\Models
 */
class Banner extends Eloquent
{
    public $timestamps = false;

    protected $fillable = [
        'banner'
    ];

    protected $hidden = ['banner'];

    protected $appends = ['banner_link'];

    public function getBannerLinkAttribute()
    {
        if ($this->banner && \File::exists(public_path('images/banners/' . $this->banner))) {
            return asset('images/banners/' . $this->banner);
        }
        return '';
    }
}
