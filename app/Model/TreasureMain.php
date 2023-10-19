<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TreasureMain extends Model
{
  protected $table = 'treasure_main';
    protected $realm;
    protected $name;
    protected $url;


  protected $fillable=[
    'realm', 'name', 'url'
  ];

  protected $casts = [
    'realm' => 'integer',
    'name' => 'string',
    'url' => 'string'
  ];
}
