<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TreasureDrop extends Model
{
  protected $table = 'treasure_drop';
  protected $realm;
  protected $castle;
  protected $server;
  protected $item;
  protected $rate;


  protected $fillable=[
    'realm', 'castle', 'server', 'item', 'rate'
  ];

  protected $casts = [
    'realm' => 'integer',
    'castle' => 'integer',
    'server' => 'integer',
    'item' => 'integer',
    'rate' => 'integer'
  ];
}