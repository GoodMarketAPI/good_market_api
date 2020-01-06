<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 06 Jan 2020 16:20:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $category
 * @property int $parent_id
 * 
 * @property \Illuminate\Database\Eloquent\Collection $categories
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int'
	];

	protected $fillable = [
		'category',
		'parent_id'
	];

	protected $with = ['categories'];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class, 'parent_id');
	}

	public function categories()
	{
		return $this->hasMany(\App\Models\Category::class, 'parent_id');
	}
}
