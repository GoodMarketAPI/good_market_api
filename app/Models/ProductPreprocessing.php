<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 16:22:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductPreprocessing
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property int $fee
 * @property string $unit
 *
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductPreprocessing extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'product_id' => 'int',
        'fee'        => 'int',
    ];

    protected $fillable = [
        'product_id',
        'name',
        'fee',
        'unit',
    ];

    protected $hidden = [
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
