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
}

