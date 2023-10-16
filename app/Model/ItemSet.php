<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemSet extends Model
{
  protected $table = 'item_set';
    protected $id;
    protected $item;
    protected $type;


  protected $fillable=[
    'id', 'item', 'type'
  ];
}

