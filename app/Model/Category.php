<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';
	protected $type;
	protected $category;
	protected $subcat;
	protected $version;
	protected $name;


	protected $fillable=[
		'type', 'category', 'subcat', 'version', 'name'
	];

	protected $casts = [
		'type' => 'string',
		'category' => 'integer',
		'subcat' => 'integer',
		'version' => 'integer',
		'name' => 'string'
	];
}
