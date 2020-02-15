<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 15 Feb 2020 17:30:51 +0000.
 */

namespace App\Models;

use Carbon\Carbon;
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

    protected $appends = ['items'];

    public function getItemsAttribute()
    {
        switch ($this->id) {
            case 1:
            case 2:
                $items = Product::withCount('order_details')
                    ->orderByDesc('order_details_count')
                    ->take(5)
                    ->get();
                break;
            case 3:
                $items = Product::withCount('order_details')
                    ->orderByDesc('order_details_count')
                    ->take(5)
                    ->get();
                break;
            case 4:
                $items = "";
                break;
            case 5:
                $items = "";
                break;
            case 6:
                $items = "";
                break;
            case 7:
                $items = "";
                break;
            case 8:
                $items = "";
                break;
            case 9:
                $items = "";
                break;
            default:
                $items = "";
                break;
        }
        return $items;
    }
}
