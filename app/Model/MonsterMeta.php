<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonsterMeta extends Model
{
  protected $table = 'monster_Meta';
    protected $id;
    protected $monster;
    protected $amount;
    protected $num;


  protected $fillable=[
    'id', 'monster', 'amount', 'num'
  ];

  protected $casts = [
    'id' => 'integer',
    'monster' => 'integer',
    'amount' => 'integer',
    'num' => 'integer'
  ];
}

