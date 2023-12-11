<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapSpawn extends Model
{
  protected $table = 'map_spawn';
  protected $index;
  protected $id;
  protected $version;
  protected $monster;
  protected $amount;
  protected $time;
  protected $grp;
  protected $server;
  protected $flag;
  protected $name;

  protected $fillable=[
    'index', 'id', 'version', 'monster', 'amount', 'time', 'grp', 'server', 'flag', 'name'
  ];

  protected $casts = [
    'index' => 'integer',
    'id' => 'string',
    'version' => 'integer',
    'monster' => 'integer',
    'amount' => 'integer',
    'time' => 'integer',
    'grp' => 'integer',
    'server' => 'integer',
    'flag' => 'integer',
    'name' => 'string'
  ];
}
