<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonsterMob extends Model
{
  protected $table = 'monster_Mob';
  protected $id;
  protected $type;
  protected $slave;
  protected $amount;

  protected $fillable=[
    'id', 'type', 'slave', 'amount'
  ];

  protected $casts = [
    'id' => 'integer',
    'type' => 'integer',
    'slave' => 'integer',
    'amount' => 'integer'
  ];
}

