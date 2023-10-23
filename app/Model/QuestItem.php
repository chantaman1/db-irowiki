<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestItem extends Model
{
  protected $table = 'quest_item';
    protected $id;
    protected $type;
    protected $server;
    protected $item;
    protected $amount;


  protected $fillable=[
    'id', 'type', 'server', 'item', 'amount'
  ];

  protected $casts = [
    'id' => 'integer',
    'type' => 'integer',
    'server' => 'integer',
    'item' => 'integer',
    'amount' => 'integer'
  ];
}
