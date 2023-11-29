<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFlag extends Model
{
  protected $table = 'map_flag';
  protected $id;
  protected $server;
  protected $flag;


  protected $fillable=[
    'id', 'server', 'flag'
  ];

  protected $casts = [
    'id' => 'string',
    'server' => 'intiger',
    'flag' => 'intiger'
  ];
}
