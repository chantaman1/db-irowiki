<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonsterDrop extends Model
{
  protected $table = 'monster_Drop';
  protected $id;
  protected $type;
  protected $slot;
  protected $version;
  protected $server;
  protected $item;
  protected $rate;
  protected $flag;

  protected $fillable=[
    'id', 'type', 'slot', 'version', 'server', 'item', 'rate', 'flag'
  ];

  protected $casts = [
    'id' => 'integer',
    'type' => 'integer',
    'slot' => 'integer',
    'version' => 'integer',
    'server' => 'integer',
    'item' => 'integer',
    'rate' => 'integer',
    'flag' => 'integer'
  ];
}

