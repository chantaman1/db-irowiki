<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
  protected $table = 'shop_item';
    protected $index;
    protected $id;
    protected $spot;
    protected $server;
    protected $item;
    protected $version;


  protected $fillable=[
    'id', 'spot', 'server', 'item', 'version'
  ];

  protected $casts = [
    'index' => 'integer',
    'id' => 'string',
    'spot' => 'integer',
    'server' => 'integer',
    'item'  => 'integer',
    'version' => 'integer'
  ];
}
