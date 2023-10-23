<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemSet extends Model
{
  protected $table = 'item_set';
    protected $index;
    protected $id;
    protected $item;
    protected $type;


  protected $fillable=[
    'index', 'id', 'item', 'type'
  ];

  protected $casts = [
    'index' => 'integer',
    'id' => 'integer',
    'item' => 'integer',
    'type' => 'integer'
  ];
}

