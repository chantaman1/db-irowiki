<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemArrow extends Model
{
  protected $table = 'item_arrow';
  protected $item;
  protected $arrow;
  protected $amount;
  protected $flag;

  protected $fillable=[
    'item', 'arrow', 'amount', 'flag'
  ];

  protected $casts = [
    'item' => 'integer',
    'arrow' => 'integer',
    'amount' => 'integer',
    'flag' => 'integer'
  ];
}

